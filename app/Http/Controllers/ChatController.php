<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BrandInfluencerNotification;
use App\Models\BrandPackage;
use App\Models\BrandPackageDetail;
use App\Models\BrandPoints;
use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function influencerChatIndex()
    {
        // return         $influencer = User::whereHas('roles', function ($q) {
        //     $q->where('name', 'brand');
        // })->get();
        // return "influencer";

        $chats = ChatGroup::with('chat')
            ->whereHas('chat')
            ->with('influencer')
            ->with('brand')
            ->orderBy('id', 'desc');
        // return $chats;

        if (Auth::user()->hasRole(['Influencer'])) {
            $chats = $chats->where('influencerId', Auth::user()->id)->get();
        }
        if (Auth::user()->hasRole(['Brand'])) {
            $chats = $chats->where('brandId', Auth::user()->id)->get();
        }
        return view('chats.influencer.index', compact('chats'));
    }

    public function newInfluencerChatIndex(Request $request)
    {
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $receiverId = $request->receiverId;
        $sessionUser = Session()->get('role');
        if ($sessionUser == 'brand') {
            $findChatGroup = ChatGroup::where('influencerId', $receiverId)
                ->where('brandId', $id)
                ->first();
        }
        if ($sessionUser == 'influencer') {
            $findChatGroup = ChatGroup::where('influencerId', $id)
                ->where('brandId', $receiverId)
                ->first();
        }
        if (!$findChatGroup) {
            $roles = Auth::user()->roles->pluck('name');

            $newChat = new ChatGroup();
            $newChat->brandId = $id;
            $newChat->influencerId = $receiverId;
            if ($roles->contains('Brand')) {
                $newChat->session = "brand";
            }
            if ($roles->contains('Influencer')) {
                $newChat->session = "influencer";
            }
            $newChat->save();

            $chat  = new Chat();
            $chat->groupId = $newChat->id;
            if ($roles->contains('Brand')) {
                $chat->session = "brand";
            }
            if ($roles->contains('Influencer')) {
                $chat->session = "influencer";
            }
            $chat->message = $request->message;


            $brandPackageSum = BrandPoints::where('userId', '=', $id)->sum('points');
            $brandPackage = BrandPoints::where('userId', '=', $id)->first();


            if ($brandPackageSum > 0) {
                $package = BrandPackage::where('points', $brandPackage->points)->first();


                if ($package) {
                    $packageDetailData = BrandPackageDetail::where('brandPackageId', $package->id)->where('details', 'Like', '%per message%')->first();

                    if ($packageDetailData) {
                        $activity = Activity::where('id', $packageDetailData->activityId)->first();
                        $packageDetail = BrandPackageDetail::where('brandPackageId', $package->id)
                            ->where('activityId', $activity->id)
                            ->first();

                        if ($packageDetail && $packageDetail->points < $brandPackageSum) {
                            // Assuming $campaign is defined somewhere in your code

                            $chat->save();

                            $point = new BrandPoints();
                            $point->userId = $id;
                            $point->email = $email;
                            $point->points = '-' . $packageDetail->points;
                            $point->remark = 'Sent Message';
                            $point->save();
                        }
                    } else {
                        return \redirect()->back()->with('warning', "some issue in package");
                    }
                }
            } else {
                return \redirect()->back()->with('warning', "You don't have enough points to Send Message,  Please purchase or renew your package.");
            }
            return redirect()->back()->with('success', 'Message send successfully you can send other message at Chat menu');
        } else {
            $chat  = new Chat();
            $chat->groupId = $findChatGroup->id;
            $chat->session = "brand";
            $chat->message = $request->message;
            $chat->save();
            return redirect()->back()->with('success', 'Message send successfully you can send other message at Chat menu');
        }
    }

    public function newBrandChatIndex(Request $request)
    {
        $id = Auth::user()->id;
        $receiverId = $request->receiverId;
        $newChat = new ChatGroup();
        $newChat->brandId = $receiverId;
        $newChat->influencerId = $id;
        $newChat->session = "influencer";
        $newChat->save();

        $chat  = new Chat();
        $chat->groupId = $newChat->id;
        $chat->session = "influencer";
        $chat->message = $request->message;
        $chat->save();

        return redirect()->back()->with('success', 'Message send successfully you can send other message at Chat menu');
    }

    function fetchMessage($brandId, $influencerId)
    {


        $chatGroups = ChatGroup::where('brandId', $brandId)
            ->where('influencerId', $influencerId)
            ->first();
        $chats = Chat::where('groupId', $chatGroups->id)
            ->orderBy('created_at', 'asc')
            ->with('chatGroup')
            ->whereHas('chatGroup')
            // where('senderId', $chatGroups->influencerId)
            // ->where('senderId', Auth::user()->id)
            ->get();


        return response()->json($chats);
    }
    public function sendMessageInfluencer(Request $request)
    {
        // $chatStatus = Chat::where('groupId', $request->groupId)
        //     ->where('senderId', Auth::user()->id)->latest()->first();
        // $chatStatus->status = 'read';
        // $chatStatus->save();

        $chat = new Chat();
        $chat->groupId = $request->groupId;
        $chat->session = session('role');
        $chat->message = $request->message;
        $chat->save();

        $notification = new BrandInfluencerNotification();
        $notification->userId = $request->recevierId;   // receiver id
        $notification->title = "New Message from " . Auth::user()->name;
        $notification->type = "General";
        $notification->visible = "N";
        $notification->dateTime = Carbon::now();
        $notification->save();

        return response()->json(['success' => true]);
    }

    public function fetchBrandMessages($brandId, $influencerId)
    {


        $chatGroups = ChatGroup::where('brandId', $brandId)
            ->where('influencerId', $influencerId)
            ->first();
        $chats = Chat::where('groupId', $chatGroups->id)
            ->orderBy('created_at', 'asc')
            ->with('chatGroup')
            ->whereHas('chatGroup')
            // where('senderId', $chatGroups->influencerId)
            // ->where('senderId', Auth::user()->id)
            ->get();


        return response()->json($chats);
    }


    public function findNewChat(Request $request)
    {
        $search = $request->input('search');
        if (session('role') == 'influencer') {
            $users = User::whereHas('roles', function ($q) {
                $q->where('name', 'Brand');
            })->where('name', 'like', '%' . $search . '%')->get();
        } else {

            $users = User::whereHas('roles', function ($q) {
                $q->where('name', 'Influencer');
            })->where('name', 'like', '%' . $search . '%')->get();
        }
        return response()->json(['users' => $users]);
    }

    public function firstChatStore(Request $request)
    {
        $chat = new Chat();
        $chat->groupId = $chat->id;
        $chat->session = session('role');
        $chat->message = $request->message;
        $chat->save();

        return response()->json(['message' => 'Chat message stored successfully', 'chat' => $chat]);
    }


    public function addUserToTable(Request $request)
    {
        // Retrieve user ID from the request
        $userId = $request->input('user_id');

        // Assuming you have a table called 'selected_users', you can add the user to it
        $selectedUser = new ChatGroup();
        if (Auth::user()->hasRole(['Influencer'])) {

            $selectedUser->influencerId = Auth::user()->id;
            $selectedUser->brandId = $userId;
        } else {
            $selectedUser->brandId = Auth::user()->id;
            $selectedUser->influencerId = $userId;
        }
        $selectedUser->session = session('role');
        $selectedUser->save();

        $newChat = new Chat();
        $newChat->groupId = $selectedUser->id;
        $newChat->session = session('role');
        $newChat->message = "";
        $newChat->save();


        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Chat $chat)
    {
        //
    }

    public function edit(Chat $chat)
    {
        //
    }

    public function update(Request $request, Chat $chat)
    {
        //
    }

    public function destroy(Chat $chat)
    {
        //
    }
}
