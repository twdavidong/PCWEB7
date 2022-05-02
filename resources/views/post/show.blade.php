@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>{{$user->name}}</h2>
                <p>{{$post->description}}</p>
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4"></div>
            <div class="col-4">
            <br>
                <form action="{{ route('post.destroy', ['post' => $post->id]) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="right">
                        <button type="submit"  class="btn btn-primary">Delete</button>
                    </div>

                </form>
            <br>        
            </div>
        </div>
            <div class="right">
                <button  type="submit"  class="btn btn-primary" onclick="history.back();">Back</button>
            </div>
    </div>
@endsection


