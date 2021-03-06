<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        // $posts = \App\Models\Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $posts = \App\Models\Post::all();  // get all data frin Post model
        $numPosts = \App\Models\Post::where('user_id', $user->id)->count();

        $userName = DB::table('posts')
        ->rightJoin('users', 'posts.user_id', '=', 'users.id')
        ->get();

        return view('profile', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
            'numPosts' => $numPosts,
            'userName' => $userName
        ]);
    }

    public function create(){
        return view('createProfile');
    }


    public function postCreate() {
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => ['required', 'image'],
        ]);

        // store the image in uploads, under public
        // request(‘profilepic’) is like $_GET[‘profilepic’]
        $imagePath = request('profilepic')->store('uploads', 'public');

        // create a new profile, and save it
        $user = Auth::user();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->description = request('description');
        $profile->image = $imagePath;
        $saved = $profile->save();

        // if it saved, we send them to the profile page
        if ($saved) {
            return redirect('/profile');
        }
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('editProfile', [
            'profile' => $profile
        ]);
    }

    public function postEdit($id)
    {
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => 'image',
        ]);
        // Load the existing profile
        $user = Auth::user();
      
        // Find the corresponding profile with the $id,
        // Create a new profile if its empty
        $profile = Profile::find($id);
        if(empty($profile)){
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        
        $profile->description = request('description');
        // Save the new profile pic... if there is one in the request()!
        if (request()->has('profilepic')) {
            $imagePath = request('profilepic')->store('uploads', 'public');
            $profile->image = $imagePath;
        }
        // Now, save it all into the database
        $updated = $profile->save();
        if ($updated) {
            return redirect('/profile');
        }
    }
}