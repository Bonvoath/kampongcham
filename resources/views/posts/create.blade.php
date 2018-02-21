@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-sm-9">
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
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" required autofocus name="title" id="title" class="form-control" placeholder="Enter title here">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-12">
                                <textarea name="short_description" id="short_description" rows="6" required class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-12">
                                <textarea name="description" id="description" rows="6" class="form-control ckeditor" style="width:100%;">
                                </textarea>
                            </div>
                        </div>
                  
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3">
        <div class="card">
                <div class="card-header">
                    Public
                </div>
                <div class="card-block">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <button class="btn btn-primary" type="submit">Public</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button class="btn btn-danger" type="reset">Preview</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Post Type
                </div>
                <div class="card-block">
                    <div>
                        <select class="form-control" name="post_type" id="post_type">
                                <option value="page">post</option>
                                <option value="page">page</option>
                                 
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-block">
                    <div>
                        <select class="form-control" name="parent" id="parent">
                            <?php foreach ($categories as $cat): ?>
                                <option value="{{$cat->id}}">{{ $cat->name }}</option>
                            <?php endforeach ?>                    
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Feature Image
                </div>
                <div class="card-block">
                    <div style="margin-bottom: 3px;">
                        <input type="file" name="feature_image" id="feature_image" accept="image/*" class="form-control" onchange="loadFile(event)">
                    </div>
                    <div>
                        <img src="{{asset('img/default.svg')}}" id="img" width="100%">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    function loadFile(e){
        var output = document.getElementById('img');
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