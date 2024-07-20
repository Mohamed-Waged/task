@extends('blog::layouts.master')

@section('title','Edit')

@section('content')
    <div class="row">
        <div class="col-9 mx-auto">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center fw-bold" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <h3>Edit Blog</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$blog->title}}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" name="body" placeholder="Enter body" id="body" rows="3" style="resize: none">{{$blog->body}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>
                        <div>
                            <img src="{{URL::asset('website/images/'.$blog->image->path)}}" alt="" style="width:100px">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection