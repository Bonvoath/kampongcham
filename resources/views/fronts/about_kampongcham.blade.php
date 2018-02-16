@extends('layouts.detail')
@section('content')
    <br>
        <div class="detail">
            <h4>{{$detail->title}}</h4><br>
            <small style="color: gray;">{{$detail->create_at}}</small>
            <hr>
            <p>{!!$detail->description!!}</p><br>
            <p style="color: gray;"><b>អត្ថបទ ៖ {{$detail->create_by}}</b> </p>
        </div>
    <br>
@endsection