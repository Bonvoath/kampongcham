@extends('layouts.frontfull')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <?php $index = 1; $tab_index = 1; $show = ''; ?>
                    @foreach($contacttypes as $ctype)
                        @if($index == 1)
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="tab" href="#list-{{$ctype->id}}" role="tab" aria-controls="{{$ctype->name}}" aria-selected="false">{{$ctype->name}}</a>
                        @else
                            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="tab" href="#list-{{$ctype->id}}" role="tab" aria-controls="{{$ctype->name}}" aria-selected="false">{{$ctype->name}}</a>
                        @endif
                        <?php $index++; ?>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-9">
                <div class="tab-content" id="nav-tabContent">
                    @foreach($contacttypes as $ctype)
                        <?php
                            if($tab_index == 1)
                            $show='active show';
                            else
                            $show='';

                            $contacts = DB::table('contacts')
                                        ->where('active',1)
                                        ->where('contact_type_id', $ctype->id)
                                        ->get();
                        ?>
                        <div class="tab-pane fade {{$show}}" id="list-{{$ctype->id}}" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="card">
                                <div class="card-header font-M1"><i class="fa fa-envelope-o" aria-hidden="true"></i> ទំនាក់ទំនង {{$ctype->name}}</div>
                                <div class="card-body" style="padding: 0; min-height: 350px;">
                                    <table class="table table-condensed" style="margin-bottom: 0;">
                                        <thead>
                                            <tr>
                                                <th>ឈ្មោះ</th>
                                                @if($ctype->use_job==true)
                                                <th>មុខតំណែង</th>
                                                @endif
                                                <th>លេខទូរស័ព្ទ</th>
                                                <th>អីុម៉ែល</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $con)
                                                <tr>
                                                    <td>{{$con->name}}</td>
                                                    @if($ctype->use_job==true)
                                                    <td>{{$con->job}}</td>
                                                    @endif
                                                    <td>{{$con->phone}}</td>
                                                    <td>{{$con->email}}</td>
                                                </tr>        
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php $tab_index++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection