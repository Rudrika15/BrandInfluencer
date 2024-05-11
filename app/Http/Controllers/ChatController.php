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

        $chats = ChatGroup::with('chat')
            ->with('influencer')
            ->with('brand')
            ->where('session', session('role'))
            ->when(session('role') === 'influencer', function ($query) {
                $query->where('influencerId', Auth::user()->id);
            })
            ->when(session('role') === 'brand', function ($query) {
                $query->where('brandId', Auth::user()->id);
            })
            ->get();

        // return $chats = Chat::with('chatGroup')->get();


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

    public function fetchBrandMessages($brandId)
    {

        $chatGroups = ChatGroup::where('brandId', $brandId)
            ->where('influencerId', Auth::user()->id)->first();
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
        $users = User::whereHas('roles', function ($q) {
            $q->where('name', 'Brand');
        })->where('name', 'like', '%' . $search . '%')->get();

        return response()->json(['users' => $users]);
    }


    public function addUserToTable(Request $request)
    {
        // Retrieve user ID from the request
        $userId = $request->input('user_id');

        // Assuming you have a table called 'selected_users', you can add the user to it
        $selectedUser = new ChatGroup();
        $selectedUser->brandId = $userId;
        $selectedUser->influencerId = Auth::user()->id;
        $selectedUser->session = session('role');
        $selectedUser->save();

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
