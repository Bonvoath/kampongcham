@extends('layouts.detail')
@section('content')
<br>
<div class="c-news">
    <span class="news font-KL">{{$category->name}}</span>
</div>
<div class="page-by-cat">
    @foreach($posts as $p)
    <div class="row">
        <div class="col-md-4">
            <a href="{{url('post/'.$p->id)}}">
                <img width="100%" src="{{asset('uploads/posts/250x250/'.$p->feature_image)}}" alt="feature image">
            </a>
        </div>
        <div class="col-md-8">
            <h5><a style="text-decoration: none; color: #555;" href="{{url('post/'.$p->id)}}">{{$p->title}}</a></h5>
            <small class="text-danger"><img src="{{asset('front/img/date.png')}}" alt="date"> : {{$p->create_at}}</small><hr>
            <aside><a style="text-decoration: none; color: #555;" href="{{url('post/'.$p->id)}}">{{$p->short_description}}</a></aside>
        </div>
    </div><hr>
    @endforeach
    {{$posts->links()}}
</div><br>
@endsection