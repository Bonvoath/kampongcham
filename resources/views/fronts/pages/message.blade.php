@extends('layouts.detail')
@section('content')
    <br>
    <div class="detail" align="center">
        <img src="{{asset('front/img/minister.jpg')}}"><br><br>
        <h4>{{$message->title}}</h4>
        <hr>
        {!!$message->description!!}
    </div>
    <br>
@endsection