@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="card" style="margin-bottom:1px;">
                <div class="card-header">Pages <span class="pull-right clickable panel-collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block">
                
                </div>
            </div>
            <div class="card" style="margin-bottom:1px;">
                <div class="card-header">Posts <span class="pull-right clickable panel-collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                
                </div>
            </div>
            <div class="card" style="margin-bottom:1px;">
                <div class="card-header">Categories <span class="pull-right clickable panel-collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                
                </div>
            </div>
            <div class="card">
                <div class="card-header">Custom Link <span class="pull-right clickable panel-collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-8">
            <div class="card">
                <div class="card-header">Menus</div>
                <div class="card-block">
                    <ul class="list-group">
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