<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUser = Auth::user();
        $currentUser = User::find($currentUser->id);
        $friendList = $currentUser->friends()->pluck("friends.friend_id");
        $users = User::whereNotIn("id",$friendList)
         ->where("id","!=",$currentUser->id)
         ->with("hobbies")
         ->get();
        
        return view('home', ["users" => $users]);
    }
}
