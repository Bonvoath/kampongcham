@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-bold">
                <i class="fa fa-align-justify"></i> Create Product&nbsp;&nbsp;
                <a href="{{url('/company')}}" class="btn btn-link btn-sm">
                    Back
                </a>
            </div>
            <div class="card-block">
                @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/company/save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shop_owner_id" class="control-label col-sm-4">Shop Owner ID<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="shop_owner_id" autofocus name="shop_owner_id" required value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-4">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="address" class="control-label col-sm-4">Address <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}"
                                        required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="email" class="control-label col-sm-4">E-mail <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" min="0" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="phone" class="control-label col-sm-4">Phone <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="log" name="phone" value="{{old('phone')}}"
                                        required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="contact_person" class="control-label col-sm-4">Contact Person <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" min="0" class="form-control" id="contact_person" name="contact_person" value="{{old('contact_person')}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="payment" class="control-label col-sm-4">Payment <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                    <textarea name="payment" id="payment" required class="form-control ckeditor" >{{old('payment')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="category" class="control-label col-sm-4">Description</label>
                                    <div class="col-sm-12">
                                        <textarea name="description" id="description" class="form-control ckeditor">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Logo</label>
                            <div class="col-lg-6 col-sm-6">
                                <input type="file" name="logo" id="logo" class="form-control" onchange="loadFile(event)">
                                <br>
                                <img src="" alt="" width="120" id="preview">
                            </div>
                        </div>
                        
                        <div class="row">   
                                <div class="col-sm-6">
                                    <div class="form-group"> 
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="btn_save" class="btn btn-primary">Save</button>
                                            <button type="reset" class="btn btn-danger">Clear</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    function loadFile(e){
        var output = document.getElementById('preview');
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection