@extends('layouts.mobile')
@section('content')
    <div>
        <div style="font-size: 16px; font-weight: 600; line-height:24px;">{{$detail->title}}</div>
        <small style="color: gray;"><img src="{{asset('front/img/date.png')}}" alt="date">  : {{$detail->create_at}}</small>
        <hr>
        <div id="box_content">
            <p class="font-KC">{!!$detail->description!!}</p><br>
            <p style="color: gray;"><b>អត្ថបទ ៖ {{$detail->create_by}}</b> </p>
        </div>
    </div>
@endsection
@section('js')
    <script>
        (function(){
            $('#box_content img').css({'width':'100%', 'height':'auto', 'margin-bottom':'5px'});
        })();
    </script>
@endsection