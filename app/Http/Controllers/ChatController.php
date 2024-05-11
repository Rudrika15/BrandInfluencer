<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\User;
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
            ->with('brand');

        if (Auth::user()->hasRole(['Influencer'])) {
            $chats = $chats->where('influencerId', Auth::user()->id)->get();
        }
        if (Auth::user()->hasRole(['Brand'])) {
            $chats = $chats->where('brandId', Auth::user()->id)->get();
        }

        return view('chats.influencer.index', compact('chats'));
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
