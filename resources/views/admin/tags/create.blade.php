@extends('layouts.app')

@section('title')
Tag Creation
@endsection

@section('content')
    <div class="container card d-block p-5" id="tagCreate">
        <h1>Create</h1>
        <form action="{{route('admin.tags.store')}}" method="POST" class="m-auto" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-column">
                <label for="name"><h5>Name:</h5></label>
                <input type="text" name="name" id="name" class="w-25" required placeholder="Tag name">
            </div>
            <div class="d-flex flex-column">
                <label for="fa_icon"><h5>Font Awesome icon HTML:</h5></label>
                <input type="text" name="fa_icon" id="fa_icon" class="w-50" placeholder='<i class="fa-solid fa-not-a-pro-icon"></i>'>
            </div>
            <button type="submit" class="btn btn-primary col-2 my-3">Create</button>
        </form>
    </div>
@endsection