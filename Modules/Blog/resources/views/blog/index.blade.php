@extends('blog::layouts.master')

@section('title','All Blogs')

@section('content')

    <div class='mb-3'>
        <a href="{{route('blog.create')}}" class="btn btn-success">Create Blog</a>
    </div>

    <div class="row">
        <div class="col">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show text-center w-50 mx-auto" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Publish Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->body }}</td>
                            <td>{{ $blog->created_at->diffForHumans() }}</td>
                            <td>
                                <img src="{{URL::asset('website/images/'.$blog->image->path)}}" alt="" style="width:70px">
                            </td>
                            <td>
                                <a href="{{route('blog.show',$blog->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-warning mx-5">Edit</a>
                                <form class='d-inline' action="{{route('blog.destroy',$blog->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection