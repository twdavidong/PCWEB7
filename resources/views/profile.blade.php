@extends('layouts.app')
@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-3">
           <img class="rounded-circle" width="150" src="/storage/{{ $profile->image }}"> <!-- showing the profile image in oval shape -->
       </div>
       <div class="col-md-9">
           <h3>{{ $user->name }}</h3>
           <span><strong>{{ $numPosts }}</strong> posts</span>  <!-- show count number of posts -->
           <div class="pt-3">{{$profile->description}}</div>  <!-- showing profile description -->
            <div class="pt-3"><a href="/profile/edit">Edit profile</a></div>  <!-- Edit link to the Profile -->
       </div>
   </div>
    <div class="row pt-5">
        @foreach($posts as $post)
        
            <div class="col-4 mb-5">
                <a href="/post/{{$post->id}}">
                    <span>{{$post->user_id}} </span> <!-- showing userID $post->user_id-->
                        
                        <!-- Convert user_id to name -->

                    <span>{{$post->description}}</span>  <!-- showing post description -->
                    <img src="/storage/{{$post->image}}" class="w-100">  <!-- showing the post image -->
                </a>
            </div>
        @endforeach
    </div>
            <a href="/home">
            <button  type="submit"  class="btn btn-primary" >Back</button>
            </a>
</div>
@endsection