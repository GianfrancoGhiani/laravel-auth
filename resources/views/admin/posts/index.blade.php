@extends('layouts.app')

@section('content')
    <section id="postIndex">
        <div class="container post-list">
            <div class="row my-3 justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Post list:</h4>
                        </div>
        
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
        <div class="container">
            <div class="row my-3 ">
                <div class="col-8 offset-2">
                    <div class="card p-5 ">
                        <form action="{{route('admin.posts.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Create a new Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection