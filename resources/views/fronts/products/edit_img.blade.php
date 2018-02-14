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
            <form enctype="multipart/form-data"  action="{{url('/shop-owner/product/img/update')}}" method="post" class="from-horizontal">
                {{csrf_field()}}
                <input type="hidden" value="{{$image->id}}" name="id">
                <input type="hidden" value="{{$image->product_id}}" name="product_id">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <label class="col-sm-12">Product Image</label>
                        <div class="col-sm-12">
                            <input type="file" required name="image" class="form-control" onchange="loadFile(event)">
                            <br>
                            <img src="{{asset('upload/product/'.$image->image)}}" alt="product" width="150" id="img">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12"><br>
                    <button type="submit" class="btn btn-primary border-radius-none">Save Change</button>
                    <a href="{{url('/shop-owner/product/detail/'.$image->product_id)}}" class="btn btn-danger border-radius-none">Cancel</a>
                </div>
            </form>
        </div>
    </div> 
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection