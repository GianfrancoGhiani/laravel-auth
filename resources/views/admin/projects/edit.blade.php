@extends('layouts.app')

@section('title')
{{$tag->name}}
@endsection

@section('content')
    <div class="container card d-block p-5" id="projEdit">
        <h1>Edit: {{$project->title}}</h1>
        <form action="{{route('admin.projects.update', ['project'=>$project->slug])}}" method="POST" class="row m-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title"><h5>Title:</h5></label>
            <input type="text" name="title" id="title" class="col-4" value="{{old('title', $project->title)}}">
            <div class="my-3 row">
                <label for="content" ><h5>Content:</h5></label>
                <textarea name="content" id="content" cols="30" rows="10">{{old('content', $project->content)}}</textarea>
            </div>
            <div>
                <label for="overview_image"><h5>Insert your porject image</h5></label>
                <input type="file" name="overview_image" id="overview_image" >
            </div>
            <button type="submit" class="btn btn-primary col-2 my-3">Update</button>
        </form>
    </div>
@endsection