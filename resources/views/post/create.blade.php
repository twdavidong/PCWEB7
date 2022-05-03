@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="description">
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Add Item!</button>
                    </div>

                </form>
                    
                   <div>
                        <button type="submit" class="btn btn-primary border" onclick="history.back();">Back</button>
                    </div>
            </div>
                    
        </div>
           

                
    </div>
@endsection



