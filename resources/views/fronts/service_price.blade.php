@extends('layouts.frontfull')
@section('content')
    <input type="hidden" id="id" value="{{$id}}">
    <div class="card">
        <div class="card-header">
           <div class="font-KL"><i class="fa fa-align-justify"></i> <span id="sp_title"></span></div>
        </div>
        <div class="card-body" style="padding: 0;">
            <table id="ltable" class="table table-condensed table-hover" style="font-size: 11pt;">
                <thead>
                    <tr>
                        <th class="text-center" style="vertical-align:middle;">ល.រ</th>
                        <th style="vertical-align:middle;">ឈ្មោះសេវា</th>
                        <th class="text-center" style="vertical-align:middle;">តំលៃ (រៀល)</th>
                        <th class="text-center" style="width:95px; vertical-align:middle;">រយះពេល (ថ្ងៃធ្វើការ)</th>
                        <th style="vertical-align:middle;">ឯកតា</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('js/frontend/service.price.js')}}"></script>
@endsection