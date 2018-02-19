@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Governor History List&nbsp;&nbsp;
                        <a href="{{url('/governor-history/create')}}" class="btn btn-link btn-sm">
                             New
                        </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                
                                <th>Image</th>
                                <th>Name</th>
                                <th>Start Year</th>
                                <th>End Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($governor_histories as $g)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset('/img/').'/'.$g->photo}}" width="65"/></td>
                                    <td>{{$g->name}}</td>
                                    <td>{{$g->start_year}}</td>
                                    <td>{{$g->end_year}}</td>
                                   
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{url('/governor-history/edit/'.$g->id)}}" title="Edit">Edit</a>
                                        <a class="btn btn-xs btn-danger"  href="{{url('/governor-history/delete/'.$g->id)}}" title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{$governor_histories->links()}}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection