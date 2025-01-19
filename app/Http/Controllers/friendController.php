<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class friendController extends Controller
{
    function index()
    {
        $currentUser = Auth::user();
        $currentUser = User::find($currentUser->id);
        $friendList = $currentUser->friends()->with("hobbies")->get();

        return view("friend", ["users" => $friendList]);
    }

    function add(Request $request)
    {
        $currentUser = Auth::user();
        $currentUser = User::find($currentUser->id);
        $currentUser->friends()->attach($request->friend_id);
        
        return redirect()->back()->with('success', 'Friend added successfully!');
    }
}
