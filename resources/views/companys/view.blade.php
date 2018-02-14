@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Detail Company&nbsp;&nbsp;
                    <a href="{{url('/company')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    <form 
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-12 col-sm-12 text-center">
                                <img src="{{asset('upload/company/'.$company->logo)}}" alt="logo" width="120"> 
                            </label>
                        </div><hr>
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-6 col-sm-6">
                            	<p class="text-primary">Name</p>
                                {{$company->name}}
                            </label>
                            <label for="title" class="control-label col-lg-6 col-sm-6">
                                <p class="text-primary">Address</p>
                                {{$company->address}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-6 col-sm-6">
                            	<p class="text-primary">Contact Person</p>
                                {{$company->contact_person}}
                            </label>
                            <label for="title" class="control-label col-lg-6 col-sm-6">
                                <p class="text-primary">Phone</p>
                                {{$company->phone}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-6 col-sm-6">
                            	<p class="text-primary">E-mail</p>
                                {{$company->email}}
                            </label>
                            <label for="title" class="control-label col-lg-6 col-sm-6">
                                <p class="text-primary">Payment</p>
                                {!!$company->payment!!}
                            </label>
                        </div> 
                        <div class="row">
                            <label for="description" class="control-label col-lg-12 col-sm-12">
                                <p class="text-primary">Description</p>
                                <p>{!!$company->description!!}</p>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection