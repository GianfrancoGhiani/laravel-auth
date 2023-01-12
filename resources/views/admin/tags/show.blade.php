@extends('layouts.app')

@section('title')
{{$tag->name}}
@endsection

@section('content')
    <section id="tagShow">
        <div class="container">
            <h1>{{$tag->title}}</h1>
            <div class="post-body row">
                @if ($tag->fa_icon)
                     <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h1 class="me-3">{!!$tag->fa_icon!!}</h1><h1>{{$tag->name}}</h1>
                        </div>
                        <div class="card-body"></div>
                    </div>
                @else
                <div class="card">
                    <div class="card-header">
                        <h1>{{$tag->name}}</h1>
                    </div>
                    <div class="card-body"></div>
                </div>
                @endif
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