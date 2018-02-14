@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Customer List&nbsp;&nbsp;
                    <a href="{{url('/customer/create')}}" class="btn btn-link btn-sm">New</a>
                    <div class="col-sm-4 col-lg-4 pull-right">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder='Search...'>
                            <input class="input-group-addon" type="submit" id="search" value="Search">
                        </div>
                    </div>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($customers as $cus)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$cus->first_name}}</td>
                                    <td>{{$cus->last_name}}</td>
                                    <td>{{$cus->phone}}</td>
                                    <td>{{$cus->email}}</td>
                                    <td>{{$cus->username}}</td>
                                    <td>
                                        <a href="{{url('/customer/edit/'.$cus->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/customer/delete/'.$cus->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection