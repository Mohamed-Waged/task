@extends('blog::layouts.master')

@section('title','Create')

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
                    <h3>Create Blog</h3>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Enter title">
                        </div>
                
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" name="body" placeholder="Enter body" id="body" rows="3" style="resize: none">{{old('body')}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image"  >
                        </div>
                
                        <button class="btn btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection