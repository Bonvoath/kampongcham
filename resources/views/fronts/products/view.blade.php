@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Product
            / <a href="{{url('/shop-owner/product')}}" class="text-info">Back to List</a></div>

        <div class="panel-body">
            <div class="panel-body">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-5">Name</label>
                        <div class="col-sm-7">
                            <p>{{$product->name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Shop Name</label>
                        <div class="col-sm-7">
                            <p>{{$product->shop_name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Quantity</label>
                        <div class="col-sm-7">
                            <p>{{$product->quantity}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Model</label>
                        <div class="col-sm-7">
                            <p>{{$product->model}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-5">Price</label>
                        <div class="col-sm-7">
                            <p>{{$product->price}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 text-danger">Discount</label>
                        <div class="col-sm-7">
                            <p class="text-danger">{{$product->discount}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Category</label>
                        <div class="col-sm-7">
                            <p>{{$product->cat_name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Short Description</label>
                        <div class="col-sm-7">
                            <p>{{$product->short_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-12">Product Image /  <button class="btn btn-success btn-xs" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> New</button></label>
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>&numero;</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @php($i=1)
                                    @foreach($images as $img)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>   <img src="{{asset('upload/product/'.$img->image)}}" alt="product" width="50"><br></td>
                                            <td>
                                                <a href="{{url('/shop-owner/product/img/edit/'.$img->img_id)}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                                <a href="{{url('/shop-owner/product/img/delete/'.$img->img_id.'/'.$img->product_id)}}" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash-o text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <hr>
                    <div class="form-group row">
                        <label class="col-sm-12">Description</label>
                        <div class="col-sm-12">
                            <p>{!!$product->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var product_id = '{{ $product->id}}';
    </script>
@endsection
@section('js')
    <script src="{{asset('front/js/upload_product_img.js')}}"></script>
@endsection
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">New Product Image</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <label class="col-sm-12">Product Image</label>
                        <div class="col-sm-12">
                            <input type="file" name="images[]" class="form-control" onchange="loadFile(event)" multiple>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="save_item_detail" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>