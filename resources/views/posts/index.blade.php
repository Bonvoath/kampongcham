@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Post List&nbsp;&nbsp;
                    <a href="{{url('/post/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Feature Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($posts as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{asset('uploads/posts/250x250/'.$p->feature_image)}}" alt="feature image" width="100"></td>
                                    <td>{{$p->title}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{url('/post/view/'.$p->id)}}" title="Detail">Detail</a>
                                        <a class="btn btn-xs btn-primary" href="{{url('/post/edit/'.$p->id)}}" title="Edit">Edit</a>
                                       <a class="btn btn-xs btn-danger"href="{{url('/post/delete/'.$p->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete">Delete</a>
                          
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection