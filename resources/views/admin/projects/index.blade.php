@extends('layouts.app')
@section('title')
    Portfolio
@endsection

@section('content')
    <section id="projIndex">
        <div class="container post-list">
            @if(session()->has('message'))
                <div class="alert alert-success text-primary mb-3 mt-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row my-3 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Project list:</h4>
                        </div>
                        
        
                        <div class="card-body">
                            <ul class="container-fluid">
                                @foreach ($projects as $project)
                                    <li class="row row-cols-2">
                                        <a href="{{route('admin.projects.show', $project->slug)}}" title="View project">
                                            {{$project->title}} 
                                            @if ($project->tag_id)
                                                <sub title="{{$project->tag->name}}">
                                                @if (!empty($project->tag->fa_icon))
                                                    {!!$project->tag->fa_icon!!}                                                   
                                                @else
                                                    {{$project->tag->name}}
                                                @endif                                                   
                                                
                                            </sub>
                                            @endif
                                            
                                        </a> 

                                        {{-- edit part --}}
                                        <div class="edit col-auto row row-cols-2">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row my-3 ">
                <div class="col-12">
                    <div class="card p-5 ">
                        <form action="{{route('admin.projects.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Public a new Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection