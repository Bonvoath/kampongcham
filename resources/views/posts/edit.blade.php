@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Post&nbsp;&nbsp;
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
                    	action="{{url('/post/update')}}" 
                    	class="form-horizontal" 
                        method="post"
                        enctype="multipart/form-data"
                    >
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id" value="{{$post->id}}">
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2 col-sm-2">
                            	Title <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="title" id="title" class="form-control" value="{{$post->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent" class="control-label col-lg-2 col-sm-2">Category</label>
                            <div class="col-lg-6 col-sm-8">           
                                <select class="form-control" name="parent" id="parent"  id="parent">
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="{{$cat->id}}"  {{$cat->id==$post->category_id?'selected':''}}> {{ $cat->name }}</option>
                                       
                                    <?php endforeach ?>                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="control-label col-lg-2 col-sm-2">
                                Short Description <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <textarea name="short_description" id="short_description" rows="6" required class="form-control">{{$post->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feature_image" class="control-label col-lg-2 col-sm-2">Feature Image <span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="feature_image" id="feature_image" accept="image/*" class="form-control" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-2 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                                <img src="{{asset('uploads/posts/250x250/'.$post->feature_image)}}" id="img" width="150">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-lg-2 col-sm-2">
                                Description
                            </label>
                            <div class="col-lg-11 col-sm-10">
                                <textarea name="description" id="description" rows="6" class="form-control ckeditor">{{$post->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
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