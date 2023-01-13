@extends('layouts.app')

@section('title')
{{$tag->name}}
@endsection

@section('content')
    <section id="tagShow">
        <div class="container">
            <h1>{{$tag->title}}</h1>
            <div class="post-body row">
                     <div class="card">
                        @if ($tag->fa_icon)
                            <div class="card-header d-flex align-items-center">
                                <h1 class="me-3">{!!$tag->fa_icon!!}</h1><h1>{{$tag->name}}</h1>
                            </div>
                        
                        @else
                            <div class="card-header">
                                <h1>{{$tag->name}}</h1>
                            </div>
                        @endif
                        <div class="card-body">
                            @if ($tag->projects)
                                <ul>
                                    @foreach ($tag->projects as $project)
                                        <li class="row">
                                            <a href="{{route('admin.projects.show', $project->slug)}}"  class="col" title="View project">
                                                {{$project->title}}                                           
                                            </a> 

                                            {{-- edit part --}}
                                            <div class="edit-proj col-auto row row-cols-2">
                                                <a href="{{route('admin.projects.edit', ['project'=>$project->slug])}}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                                <form action="{{route('admin.projects.destroy',['project'=>$project->slug])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-secondary my-delete" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                                </form>
                                            </div> 
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                     </div>
            </div>

            {{-- edit pannel --}}
            <div class="card edit">
                <div class="card-header"><h5>Edit zone</h5></div>
                <div class="card-body d-flex justify-content-end">
                    <form action="{{route('admin.tags.edit', ['tag'=>$tag->slug])}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary mx-3">Edit</button>
                    </form>
                    <form action="{{route('admin.tags.destroy',['tag'=>$tag->slug])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary dng my-delete">DELETE</button>
                    </form>
                </div>
            </div>
        
        </div>
    </section>
@endsection