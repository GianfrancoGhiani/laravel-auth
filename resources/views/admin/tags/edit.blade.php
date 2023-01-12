@extends('layouts.app')

@section('title')
{{$tag->name}}
@endsection

@section('content')
    <div class="container card d-block p-5" id="tagEdit">
        <h1>Edit: {{$tag->name}}</h1>
        <form action="{{route('admin.tags.update', ['tag'=>$tag->slug])}}" method="POST" class="m-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex flex-column">
                <label for="name"><h5>Name:</h5></label>
                <input type="text" name="name" id="name" class="w-25" value="{{old('name', $tag->name)}}">
            </div>
            <div class="d-flex flex-column">
                <label for="fa_icon"><h5>Font Awesome icon HTML:</h5></label>
                <input type="text" name="fa_icon" id="fa_icon" class="w-50" value="{{old('fa_icon', $tag->fa_icon)}}">
            </div>
            <button type="submit" class="btn btn-primary w-auto my-3">Update</button>
        </form>
    </div>
@endsection