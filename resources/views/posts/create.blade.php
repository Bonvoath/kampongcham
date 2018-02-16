@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Post&nbsp;&nbsp;
                    <a href="{{url('/post')}}" class="btn btn-link btn-sm">Back To List</a>
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
                    <form 
                    	action="{{url('/post/save')}}" 
                    	class="form-horizontal" 
                        method="post"
                        enctype="multipart/form-data"
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2 col-sm-2">
                            	Title <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="title" id="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent" class="control-label col-lg-2 col-sm-2">Category</label>
                            <div class="col-lg-6 col-sm-8">           
                                <select class="form-control" name="parent" id="parent"  id="parent">
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="{{$cat->id}}">{{ $cat->name }}</option>
                                    <?php endforeach ?>                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="control-label col-lg-2 col-sm-2">
                                Short Description <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <textarea name="short_description" id="short_description" rows="6" required class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feature_image" class="control-label col-lg-2 col-sm-2">Feature Image <span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="feature_image" id="feature_image" accept="image/*" class="form-control" required onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-2 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                                <img src="" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-lg-2 col-sm-2">
                                Description
                            </label>
                            <div class="col-lg-11 col-sm-10">
                                <textarea name="description" id="description" rows="6" class="form-control ckeditor">
                                </textarea>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <!-- <label class="control-label col-lg-2 col-sm-2">&nbsp;</label> -->
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});

</script> 
@endsection