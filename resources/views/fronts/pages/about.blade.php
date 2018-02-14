@extends('layouts.front')
@section('content')
    <h4>{{$about->title}}</h4>
    <hr>
    {!!$about->description!!}
    <br>
@endsection