@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-3 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Dashboard</h4></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <ul>
                        {{-- <li><a href="{{route('posts')}}">Post area</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
