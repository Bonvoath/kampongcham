@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Post List&nbsp;&nbsp;
                    <a href="{{url('/about-kampongcham/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($about_kampongchams as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$p->title}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{url('/about-kampongcham/view/'.$p->id)}}" title="Detail">Detail</a>
                                        <a class="btn btn-xs btn-primary" href="{{url('/about-kampongcham/edit/'.$p->id)}}" title="Edit">Edit</a>
                                       <a class="btn btn-xs btn-danger"href="{{url('/about-kampongcham/delete/'.$p->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $about_kampongchams->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection