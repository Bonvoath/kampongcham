@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="card" style="margin-bottom:2px;">
                <div class="card-header">Pages <span class="circle clickable pull-right"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></div>
                <div class="card-block">
                <ul class="list-group">
                    @foreach($pages as $page)
                        <li class="list-group-item chh_categories"><input type="checkbox" data-id="{{$page->id}}"/> {{$page->title}}</li>
                    @endforeach
                    </ul>
                    <div class="form-group" style="margin-top: 5px; margin-bottom: 0;">
                        <div style="text-align: right;">
                            <button type="button" id="btnaddcat" class="btn btn-secondary btn-sm radius-3">Add To Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-bottom:2px;">
                <div class="card-header">Posts <span class="circle pull-right clickable collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                <ul class="list-group">
                    @foreach($posts as $post)
                        <li class="list-group-item chh_categories"><input type="checkbox" data-id="{{$post->id}}"/> {{$post->title}}</li>
                    @endforeach
                    </ul>
                    <div class="form-group" style="margin-top: 5px; margin-bottom: 0;">
                        <div style="text-align: right;">
                            <button type="button" id="btnaddcat" class="btn btn-secondary btn-sm radius-3">Add To Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-bottom:2px;">
                <div class="card-header">Categories <span class="circle pull-right clickable collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                    <ul class="list-group">
                    @foreach($categories as $cat)
                        <li class="list-group-item chh_categories"><input type="checkbox" data-id="{{$cat->id}}"/> {{$cat->name}}</li>
                    @endforeach
                    </ul>
                    <div class="form-group" style="margin-top: 5px; margin-bottom: 0;">
                        <div style="text-align: right;">
                            <button type="button" id="btnaddcat" class="btn btn-secondary btn-sm radius-3">Add To Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Custom Link <span class="circle pull-right clickable collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                    <div class="form-group">
                        <label for="">URL (http://www.example.com)</label>
                        <div>
                            <input type="text" id="linkmenuurl" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Link Text</label>
                        <div>
                            <input type="text" id="linkmenutext" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <div style="text-align: right;">
                            <button type="button" id="btnaddlink" class="btn btn-secondary btn-sm radius-3">Add To Menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-8">
            <div class="card">
                <div class="card-header">Menus</div>
                <div class="card-block">
                    <ul class="list-group" id="menu_list">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/menu.index.js')}}"></script>
@endsection