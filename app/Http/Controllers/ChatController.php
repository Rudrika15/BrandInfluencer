<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function influencerChatIndex()
    {
        // $influencer = User::whereHas('roles', function ($q) {
        //     $q->where('name', 'Influencer');
        // })
        //     // ->whereHas('chat')
        //     //     ->with('chat')
        //     ->get();

        $chats = Chat::where('receiverId', Auth::user()->id)->get();

        return view('chats.influencer.index', compact('chats'));
    }

    public function create()
    {
        //
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
