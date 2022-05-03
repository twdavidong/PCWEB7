<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()   // getting from database, display listing of all posts
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $pname = \App\Models\Post::where('name', $profile->user_id);
        $posts = \App\Models\Post::all();
        $numPosts = \App\Models\Post::where('user_id', $user->id)->count();
        
        return view('profile', [
            'user' => $user,
            'pname' => $pname,
            'profile' => $profile,
            'posts' => $posts,
            'numPosts' => $numPosts,
        ]);
    }

}