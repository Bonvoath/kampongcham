@extends('layouts.front')
@section('content')   
    <h4>Free Magic Video</h4>
    <hr>    
    <div class="row">
        @foreach($videos as $v)
            <div class="col-md-3 col-sm-3">
                <object data="{{$v->url}}" width="100%"></object>
            </div>
        @endforeach    
    </div>
    {{ $videos->links() }}
    <br>
@endsection