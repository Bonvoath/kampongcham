@extends('layouts.detail')
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
                        <th>ឈ្មោះ</th>
                        <th>តំលៃ</th>
                        <th>រយះពេល</th>
                        <th class="text-center" style="width: 100px;">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')

@endsection