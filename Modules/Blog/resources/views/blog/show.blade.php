@extends('blog::layouts.master')

@section('title','Show')

@section('content')
    <div class="row">
        <div class="col-9 mx-auto">
            <div class="card">
                <div class="card-header text-center"><strong>Blog Information</strong></div>
                <div class="card-body">
                    <h4 class='card-title'>Title : {{ $blog->title }}</h4>
                    <h6 class='card-text my-3'>Body : {{ $blog->body }}</h6>
                    <h6 class='card-text'>Publish Date : {{ $blog->created_at->diffForHumans() }}</h6>
                    <div class='text-center'>
                        <img src="{{URL::asset('website/images/'.$blog->image->path)}}" alt="" style="width:150px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection