@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> កែប្រែទំព័រ | 
                    <a href="{{url('/page')}}" class="btn btn-link btn-sm">ត្រលប់ក្រោយ</a>
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
                    	action="{{url('/page/update')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    >
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$page->id}}">
                        <div class="form-group row">
                            <div class="col-lg-12 col-sm-12">
                                <input 
                                    type="text" 
                                    required 
                                    autofocus 
                                    name="title" 
                                    id="title" 
                                    class="form-control"
                                    value="{{$page->title}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 col-sm-12">
                                <textarea name="description" id="description" rows="12" class="form-control ckeditor">
                                    {{$page->description}}
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
        <div class="col-sm-3 col-lg-3">
        
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});

</script> 
@endsection