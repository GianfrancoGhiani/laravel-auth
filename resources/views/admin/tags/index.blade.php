@extends('layouts.app')
@section('title')
    Portfolio - Tags
@endsection

@section('content')
    <section id="tagIndex">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success text-primary mb-3 mt-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row my-3 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tag list:</h4>
                        </div>
                        
        
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Posts Num</th>
                                        <th class="white"></th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td><a href="{{route('admin.tags.show', $tag->slug)}}" title="View tag">{!!$tag->fa_icon!!}</a></td>
                                            <td><a href="{{route('admin.tags.show', $tag->slug)}}" title="View tag">{{$tag->name}}</a></td>
                                            <td>{{count($tag->projects)}}</td>
                                            <td class="white"></td>
                                            <td>
                                                <div class="edit row row-cols-2">
                                                    <a href="{{route('admin.tags.edit', ['tag'=>$tag->slug])}}" class="btn btn-primary col-6"><i class="fa-solid fa-pencil"></i></a>
                                                    <form  class="col-6" action="{{route('admin.tags.destroy',['tag'=>$tag->slug])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-secondary my-delete" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                                    </form>
                                                </div>  
                                            </td>
                                        </tr>
                                        {{-- <li class="d-flex"><div class="me-3"></div> <div></div></li> --}}
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- 
                            <a href="{{route('admin.projects.show', $project->slug)}}" title="View project">{{$project->title}}</a> 
                            
                            --}}
                            
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row my-3 ">
                <div class="col-12">
                    <div class="card p-5 ">
                        <form action="{{route('admin.tags.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Create a new Tag</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
@endsection