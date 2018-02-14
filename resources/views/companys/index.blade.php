@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Company List&nbsp;&nbsp;
                    <a href="{{url('/company/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>address</th>
                                <th>contact_person</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>logo</th>
                                <th>payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($companys as $com)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><a href="{{url('company/view/'.$com->id)}}">{{$com->name}}</a></td>
                                <td>{{$com->address}}</td>
                                <td>{{$com->contact_person}}</td>
                                <td>{{$com->phone}}</td>
                                <td>{{$com->email}}</td>
                                <td><img src="{{asset('upload/company/'.$com->logo)}}" width="70"></td>
                                <td>{!!$com->payment!!}</td>
                                <td>
                                    <a href="{{url('/company/edit/'.$com->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/company/delete/'.$com->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><br>
                    {{ $companys->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection