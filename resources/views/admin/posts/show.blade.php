@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$post->title}}</h3>
        <div class="post-body">
            {{$post->content}}
            
        </div>
    </div>
@endsection