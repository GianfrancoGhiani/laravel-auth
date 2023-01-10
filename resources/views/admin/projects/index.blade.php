@extends('layouts.app')

@section('content')
    <section id="projIndex">
        <div class="container post-list">
            <div class="row my-3 justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Project list:</h4>
                        </div>
        
                        <div class="card-body">
                            <ul>
                                @foreach ($projects as $project)
                                    <li><a href="{{route('admin.projects.show', $project->slug)}}" title="View project">{{$project->title}}</a></li>
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