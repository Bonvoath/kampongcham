@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Detail Post&nbsp;&nbsp;
                    <a href="{{url('/post')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label for="title" class="control-label col-lg-6 col-sm-6">
                            <aside class="text-primary">Title</aside>
                            <aside>{{$post->title}}</aside>
                        </label>
                        <label for="title" class="control-label col-lg-6 col-sm-6">
                            <aside class="text-primary">Post by: </aside>
                            <aside class="success">{{$post->create_by}} <small class="text-danger">Create Date: {{$post->create_at}}</small> </aside>
                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="control-label col-lg-6 col-sm-12">
                            <aside class="text-primary">Short Description</aside>
                            <aside>{{$post->short_description}}</aside><br>
                            <aside class="text-primary">Post Type</aside>
                            <aside>{{$post->post_type}}</aside>
                        </label>
                        <div class="col-lg-6 col-sm-6">
                            <aside class="text-primary">Feature Image</aside>
                            <img src="{{asset('uploads/posts/250x250/'.$post->feature_image)}}" width="150">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="control-label col-lg-12 col-sm-12">
                            <p class="text-primary">Description</p>
                            <p>{!!$post->description!!}</p>
                        </label>
                    </div>       
                </div>
            </div>
        </div>
    </div>
@endsection