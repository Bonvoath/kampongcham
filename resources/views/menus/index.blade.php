@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="card" style="margin-bottom:2px;">
                <div class="card-header">Pages <span class="circle clickable pull-right"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></div>
                <div class="card-block">
                    
                </div>
            </div>
            <div class="card" style="margin-bottom:2px;">
                <div class="card-header">Posts <span class="circle pull-right clickable collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                
                </div>
            </div>
            <div class="card" style="margin-bottom:2px;">
                <div class="card-header">Categories <span class="circle pull-right clickable collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
                <div class="card-block" style="display:none;">
                
                </div>
            </div>
            <div class="card">
                <div class="card-header">Custom Link <span class="circle pull-right clickable collapsed"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div>
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
@section('js')
    <script>
        $('body').on('click', '.card span.clickable', function(e){
            var $this = $(this);
            if(!$this.hasClass('collapsed')) {
                $this.parents('.card').find('.card-block').slideUp();
                $this.addClass('collapsed');
                $this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
            } else {
                $this.parents('.card').find('.card-block').slideDown();
                $this.removeClass('collapsed');
                $this.find('i').removeClass('fa-chevron-right').addClass('fa-chevron-down');
            }
        });
    </script>
@endsection