@extends('layouts.app')

@section('title')
{{$project->title}}
@endsection

@section('content')
    <section id="show">
        <div class="container">
            <h1>{{$project->title}}</h1>
            <div class="post-body row">
                <div class="body-text col-4">{{$project->content}}</div>
                @if ($project->overview_image)
                    <div class="body-image col-6 offset-2"><img src="{{asset('storage/'.$project->overview_image)}}" alt=""></div>
                @endif
            </div>
            <div class="card edit">
                <div class="card-header"><h5>Edit zone</h5></div>
                <div class="card-body d-flex justify-content-end">
                    <form action="{{route('admin.projects.edit', ['project'=>$project->slug])}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary mx-3">Edit</button>
                    </form>
                    <form action="{{route('admin.projects.destroy',['project'=>$project->slug])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary dng my-delete">DELETE</button>
                    </form>
                </div>
            </div>
        
        </div>
    </section>
@endsection