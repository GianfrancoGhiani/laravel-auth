@extends('layouts.app')

@section('title')
{{$project->title}}
@endsection

@section('content')
    <div class="container" id="projEdit">
        <div class="card d-block p-5"><h1>Edit: {{$project->title}}</h1>
            <form action="{{route('admin.projects.update', ['project'=>$project->slug])}}" method="POST" class="row m-auto" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title"><h5>Title:</h5></label>
                <input type="text" name="title" id="title" class="col-4" value="{{old('title', $project->title)}}">
                <div class="my-3 row">
                    <label for="content" ><h5>Content:</h5></label>
                    <textarea name="content" id="content" cols="30" rows="4">{{old('content', $project->content)}}</textarea>
                </div>
                <div class="mb-3 p-0">
                    <label for="tag_id" class="form-label">Tag</label>
                    <select name="tag_id" id="tag_id" class="form-control w-25 @error('tag_id') is-invalid @enderror">
                      <option value="">Select tag</option>
                      @foreach ($tags as $tag)
                          <option value="{{$tag->id}}" {{ $tag->id == old('tag_id', $project->tag_id) ? 'selected' : '' }}>{{$tag->name}}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="d-flex flex-column p-0 w-100">
                    <label for="overview_image" class="w-50"><h5>Insert your porject image</h5>
                        <input type="file" name="overview_image" id="overview_image" class="input_file" >
                        <span></span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary col-2 my-3">Update</button>
            </form>
        </div>
        
    </div>
@endsection