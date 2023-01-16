@extends('layouts.app')

@section('title')
{{$project->title}}
@endsection

@section('content')
    <section id="projShow">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex align-items-baseline justify-content-between">
                    <h1>{{$project->title}}</h1>
                    <div class="info d-flex">
                        @if ($project->tag_id)
                            <div class="sub me-3" title="Tag"><a href="{{route('admin.tags.show', $project->tag->slug)}}">{{$project->tag_id ? $project->tag->name : ''}}</a></div>
                        @endif
                        @if (count($project->technologies) > 0)
                            <div class="sub text-capitalize" title="Technologies">
                                @foreach ($project->technologies as $technology)
                                    {{$technology->name}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="post-body row">
                        <div class="body-text {{$project->overview_image ? 'col-4': 'col-12'}}">{{$project->content}}</div>
                        @if ($project->overview_image)
                            <div class="body-image col-6 offset-2"><img src="{{asset('storage/'.$project->overview_image)}}" alt=""></div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- edit pannel --}}
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