@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-bold">
                <i class="fa fa-align-justify"></i> Product List&nbsp;&nbsp;
                <a href="{{url('/admin/product/create')}}" class="btn btn-link btn-sm">
                    New
                </a>
            </div>
            <div class="card-block">
                <table class="tbl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>In Price($)</th>
                            <th>Out Price($)</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>
                                <a href="{{url('/admin/product/detail/'.$p->id)}}">{{$p->name}}</a>
                            </td>
                            <td>{{$p->quantity}}</td>
                            <td>{{$p->in_price}}</td>
                            <td>{{$p->out_price}}</td>
                            <td>{{$p->category_name}}</td>
                            <td>
                                <a href="{{url('/admin/product/detail/'.$p->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                <a href="{{url('/admin/product/delete/'.$p->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><br>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>
@endsection