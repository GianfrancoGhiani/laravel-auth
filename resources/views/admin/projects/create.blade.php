@extends('layouts.app')

@section('title')
Project Creation
@endsection

@section('content')
    <div class="container card d-block p-5" id="projCreate">
        <h1>Create</h1>
        <form action="{{route('admin.projects.store')}}" method="POST" class="row m-auto" enctype="multipart/form-data">
            @csrf
            <label for="title"><h5>Title:</h5></label>
            <input type="text" name="title" id="title" class="col-4" placeholder="Insert a title...">
            <div class="my-3 row">
                <label for="content" ><h5>Content:</h5></label>
                <textarea name="content" id="content" cols="30" rows="4" placeholder="Describe your project here..."></textarea>
            </div>
            <div>
                <label for="overview_image"><h5>Insert your porject image</h5></label>
                <input type="file" name="overview_image" id="overview_image" >
            </div>
            <button type="submit" class="btn btn-primary col-2 my-3">Create</button>
        </form>
    </div>
@endsection