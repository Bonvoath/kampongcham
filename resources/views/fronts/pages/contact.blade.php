@extends('layouts.front')
@section('content')   
    <h4>{{$contact->title}}</h4>
    <hr>
    {!!$contact->description!!}
    <br>
@endsection