@extends('layouts.front')
@section('content')
    <div class="card">
        <div class="card-header">
           <div class="font-KL"><i class="fa fa-align-justify"></i> ប្រភេទសេវាខេត្តកំពង់ចាម</div>
        </div>
        <div class="card-body" style="padding: 0;">
            <table id="ltable" class="table table-condensed table-hover" style="font-size: 12pt;">
                <thead>
                    <tr>
                        <th class="text-center">ល.រ</th>
                        <th>វិស័យ</th>
                        <th style="width: 100px;"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/frontend/service.js')}}"></script>
@endsection