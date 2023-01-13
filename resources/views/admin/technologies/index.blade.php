@extends('layouts.app')
@section('title')
    Portfolio - Technologies
@endsection

@section('content')
    <section id="techIndex">
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
                            <h4>Tech list:</h4>
                        </div>
                        
        
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                        <th class="text-center">Posts Num</th>
                                        <th class="white"></th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($technologies as $technology)
                                        <tr>
                                            <td>
                                                <form action="{{route('admin.technologies.update', ['technology'=>$technology->slug])}}" method="POST" class="m-auto">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="name" id="name" class="w-auto fake-name text-capitalize" required value="{{$technology->name}}">
                                                </form>
                                            </td>
                                            <td></td>
                                            <td class="text-center">{{count($technology->projects)}}</td>
                                            <td class="white"></td>
                                            <td>
                                                <div class="edit row row-cols-2">
                                                    
                                                    {{-- <a href="{{route('admin.technologies.edit', ['tag'=>$tag->slug])}}" class="btn btn-primary col-6"><i class="fa-solid fa-pencil"></i></a> --}}
                                                    <form  class="col-6" action="{{route('admin.technologies.destroy',['technology'=>$technology->slug])}}" method="post">
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
                    <div class="card container">
                        <form action="{{route('admin.technologies.store')}}" class="row row-cols-1 card-body" method="POST">
                            @csrf
                            <label for="name" class="p-0"><h3>Create a new Tech</h3></label>
                            <input class="col-6" type="text" name="name" id="name" placeholder="Insert tech name here...">
                            <button type="submit" class="btn btn-primary w-auto offset-3">Create a new Tech</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
@endsection