@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> លេខទំនាក់ទំនងថ្មី
                    <a href="{{url('/admin/contact')}}" class="btn btn-link btn-sm">ត្រលប់ក្រោយ</a>
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
                    <form action="{{url('/admin/contact/save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="contact_type" class="control-label col-lg-2 col-sm-2">ប្រភេទនៃទំនាក់ទំនង <span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">           
                                <select class="form-control" name="contact_type" id="contact_type">
                                    <?php foreach ($contact_types as $con): ?>
                                        <option value="{{$con->id}}">{{ $con->name }}</option>
                                    <?php endforeach ?>                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ឈ្មោះ <span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">មុខតំណែង</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="job" id="job" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="control-label col-lg-2 col-sm-2">លេខទូរស័ព្ទ</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="control-label col-lg-2 col-sm-2">អ៊ីមែល</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">រក្សាទុក</button>
                                <button class="btn btn-danger" type="reset">សំអាត</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection