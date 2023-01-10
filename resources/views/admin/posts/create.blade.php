@extends('layouts.app')

@section('content')
    <div class="container card d-block p-5" id="postCreate">
        <form action="{{route('admin.posts.store')}}" method="POST" class="row m-auto">
            @csrf
            <label for="title"><h5>Title:</h5></label>
            <input type="text" name="title" id="title" class="col-4" placeholder="Insert a title...">
            <div class="my-3 row">
                <label for="content" ><h5>Content:</h5></label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Describe your project here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary col-1 my-3">Create</button>
        </form>
    </div>
@endsection