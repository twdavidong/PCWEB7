<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  // create new post
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request) //(we called this postCreate() in Tinkergram) for saving a new post
    {
        $data = request()->validate([
            'description' => 'required',
            'postpic' => ['required', 'image'],
        ]);

        $user = Auth::user();
        $profile = new Post();
        $imagePath = request('postpic')->store('uploads', 'public');

        $profile->user_id = $user->id;
        $profile->description = request('description');
        $profile->image = $imagePath;
        $saved = $profile->save();
        

        if ($saved) {
            return redirect('/profile');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postID){                      // for displaying a single post
        $post = Post::where('id', $postID)->first();
        $user = Auth::user();
        
        return view('post.showPosts',[
            'post' => $post,
            'user' => $user
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)  //to edit a single post
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)  //  (we called this postEdit() for Tinkergram) for saving an edit
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)    // for deleting a single post.
    {
        Post::where('id', $post)->first()->delete();
        return redirect('/profile');
    }
}
