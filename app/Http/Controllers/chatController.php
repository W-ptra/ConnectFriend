<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $currentUser = User::find($currentUser->id);

        $allChat = $currentUser->allChats()->with(['initiator', 'receiver'])->get();

        return view("chat", ["chats" => $allChat, "currentUser" => $currentUser->id]);
    }

    public function send()
    {
        $receiverId = request()->query("receiverId");
        $user = User::find($receiverId);
        return view("sendChat", ["receiver" => $user]);
    }

    public function createChat(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:500',
        ]);

        $chat = chat::create([
            'first_user_id' => $request->sender_id,
            'second_user_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return redirect('/chat')->with('success', 'Message sent successfully!');
    }
}
