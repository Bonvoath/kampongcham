@extends('layouts.detail')
@section('content')
    <div class="detail">
        <h4>{{$detail->title}}</h4><br>
        <small style="color: gray;"><i class="fa fa-calendar" aria-hidden="true"></i>  : {{$detail->create_at}}</small>
        <hr>
        <div class="post_content">
            <p>{!!$detail->description!!}</p><br>
            <p style="color: gray;"><b>អត្ថបទ ៖ {{$detail->create_by}}</b></p>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('js/frontend/detail.js')}}"></script>
@endsection