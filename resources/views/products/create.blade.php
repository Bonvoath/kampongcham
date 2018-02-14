@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-bold">
                <i class="fa fa-align-justify"></i> Create Product&nbsp;&nbsp;
                <a href="{{url('/admin/product')}}" class="btn btn-link btn-sm">
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
                    <form action="{{url('/admin/product/save')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-4">Product Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category" class="control-label col-sm-4">Category <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                    <select name="category" id="category" class="form-control chosen-select" data-placeholder="Chose a category" tabindex="2">
                                    <option value=""></option>
                                    @foreach($categories as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="quantity" class="control-label col-sm-4">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" step="0.01" min="0" class="form-control" id="quantity" name="quantity" 
                                             value="0">
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="discount" class="control-label col-sm-4">Discount (%)</label>
                                        <div class="col-sm-8">
                                           <input type="number" class="form-control" id="discount" value="0" name="discount">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="in_price" class="control-label col-sm-4"> In Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" step="0.01" min="0" class="form-control" id="in_price" name="in_price" 
                                             value="0">
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="is_featured" class="control-label col-sm-4">Is Featured</label>
                                        <div class="col-sm-8">
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="out_price" class="control-label col-sm-4">Out Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" step="0.01" min="0" class="form-control" id="out_price" name="out_price" 
                                             value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="short_description" class="control-label col-sm-4">Short Description</label>
                                        <div class="col-sm-8">
                                        <textarea name="short_description" id="short_description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12">
                                   <div class="form-group row">
                                        <label for="category" class="control-label col-sm-12">Description</label>
                                        <div class="col-sm-12">
                                           <textarea name="description" id="description" cols="30" rows="3" class="ckeditor form-control"></textarea>
                                        </div>
                                    </div>
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
<script src="{{asset('chosen/chosen.jquery.js')}}"></script>
<script>
        $(document).ready(function () {
            $("select").chosen();
        });
</script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});

</script> 
@endsection