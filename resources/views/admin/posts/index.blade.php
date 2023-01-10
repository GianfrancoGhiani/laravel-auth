@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-3 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Post list:</h4></div>
    
                    <div class="card-body">
                        <ul>
                            @foreach ($posts as $post)
                                <li><a href="{{route('admin.posts.show', $post->slug)}}" title="View Post">{{$post->title}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection