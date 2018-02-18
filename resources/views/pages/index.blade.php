@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> តារាងទំព័រ | 
                    <a href="{{url('/page/create')}}" class="btn btn-link btn-sm">
                        បន្ថែមថ្មី
                    </a>
                </div>
                <div class="card-block" style="padding: 0;">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><input type="checkbox"/></th>
                                <th>ចំនងជើង</th>
                                <th>អ្នកបង្កើត</th>
                                <th>កាលបរិច្ឆេទ</th>
                                <th style="width:180px;">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($pages as $pag)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$pag->title}}</td>
                                    <td>admin</td>
                                    <td>{{$pag->create_at}}</td>
                                    <td>
                                        <a class="" href="{{url('/page/view/'.$pag->id)}}" title="view">Detail</a> | 
                                        <a class=""  href="{{url('/page/edit/'.$pag->id)}}" title="Edit">Edit</a> | 
                                       <a class=""  href="{{url('/page/delete/'.$pag->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection