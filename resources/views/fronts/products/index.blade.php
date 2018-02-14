@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Product
            @if($shop!=NULL)
                / <a href="{{url('/shop-owner/product/create')}}">Create New Product</a>
            @endif
        </div>
        <div class="panel-body">
            @if($shop==NULL)
               
                <div class="row">
                    <div class="col-sm-12">
                        <p class="text-center text-success"><strong>You can't create a product. Please create one shop!</strong></p>
                        <p class="text-center">
                            <a href="{{url('/shop-owner/shop/create')}}" class="btn btn-primary border-radius-none">Create New Shop</a>
                        </p>
                    </div>
                </div>
            @else
            @if(Session::has('sms'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success border-radius-none" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            {{session('sms')}}
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('sms1'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger border-radius-none" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            {{session('sms1')}}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-block">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Model</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @php($i=1)
                        @foreach($products as $pro)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><a href="{{url('/shop-owner/product/detail/'.$pro->id)}}">{{$pro->name}}</a></td>
                                <td>{{$pro->quantity}}</td>
                                <td>{{$pro->price}}</td>
                                <td>{{$pro->discount}}</td>
                                <td>{{$pro->model}}</td>
                                <td>
                                    <a href="{{url('/shop-owner/product/detail/'.$pro->id)}}"><i class="fa fa-eye text-info"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/shop-owner/product/edit/'.$pro->id)}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/shop-owner/product/delete/'.$pro->id)}}" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash-o text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
            @endif
        </div>
    </div>
@endsection