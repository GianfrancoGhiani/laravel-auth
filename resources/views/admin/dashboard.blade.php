@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row my-3 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li><a href="{{route('admin.projects.index')}}">Projects area</a></li>
                        <li><a href="{{route('admin.tags.index')}}">Tags area</a></li>
                        <li><a href="#">Blog area</a></li>
                        <li><a href="#">Social area</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
