@extends('layouts.detail')
@section('meta')
    <meta property="og:url" content="{{url('post/'.$detail->id)}}" />
    <meta property="og:title" content="{!!substr($detail->title,0,120)!!}" />
    <meta property="og:description" content="{{$detail->title}}" />
    <meta property="og:image" content="{{asset('uploads/posts/250x250/'.$detail->feature_image)}}" />
@endsection
@section('title', $detail->title)
@section('content')
    <div class="detail">
        <h4>{{$detail->title}}</h4><br>
        <small style="color: gray;"><i class="fa fa-calendar" aria-hidden="true"></i>  : {{$detail->create_at}} </small>
        <div class="fb-like" data-href="{{url('post/'.$detail->id)}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
        <hr>
        <div class="post_content">
            <p>{!!html_entity_decode($detail->description)!!}</p><br>
            <p style="color: gray;"><b>អត្ថបទ ៖ {{$detail->create_by}}</b></p>
        </div>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=424834454385747&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@endsection
@section('js')
<script src="{{asset('js/frontend/detail.js')}}"></script>
@endsection