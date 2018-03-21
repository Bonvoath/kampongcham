@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Contact Type List&nbsp;&nbsp;
                    <a href="{{url('/contact/type/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>ឈ្មោះ</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($contact_types as $c)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{url('/contact/type/edit/'.$c->id)}}" title="Edit">Edit</a>
                                        <a class="btn btn-xs btn-danger"  href="{{url('/contact/type/delete/'.$c->id)}}" title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{$contact_types->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection