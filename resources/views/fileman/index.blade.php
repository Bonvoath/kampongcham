@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <iframe src="{{asset('fileman/index.html?integration=ckeditor&CKEditor=description&CKEditorFuncNum=1&langCode=en')}}" frameborder="0" width="100%" height="600px"></iframe>
    </div>
</div>
@endsection