@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Product
            / <a href="{{url('/shop-owner/product')}}" class="text-info">Back to List</a>
        </div>
        <div class="panel-body">
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
        <div class="col-md-12 col-sm-12">
            <form enctype="multipart/form-data"  action="{{url('/shop-owner/product/update')}}" method="post" class="from-horizontal">
                {{csrf_field()}}
                <input type="hidden" value="{{$product->id}}" name="id">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">
                                Category <span class="text-danger">*</span></label>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control" name="category">
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $product->category_id?'selected':''}}> {{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>     
                        <div class="form-group row">
                            <label class="col-sm-4">Price <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-radius-none" name="price" step="0.01" required value="{{$product->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-radius-none" name="quantity" value="{{$product->quantity}}">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4">Discount</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-radius-none" step="0.1" name="discount" value="{{$product->discount}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Model <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="model" value="{{$product->model}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">
                                Short Description
                            </label>
                            <div class="col-sm-8">
                                <textarea name="short_description" class="form-control" rows="4">{{$product->short_description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <label class="col-sm-12">
                                Description
                            </label>
                            <div class="col-sm-12">
                                <textarea name="description" class="ckeditor">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary border-radius-none">Save</button>
                            <a href="{{url('/shop-owner/product')}}" class="btn btn-danger border-radius-none">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@endsection