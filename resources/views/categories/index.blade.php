@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> ប្រភេទអត្ថបទ
                    <a href="{{url('/admin/category/create')}}" class="btn btn-link btn-sm">បន្ថែមថ្មី</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>ឈ្មោះ</th>
                                <th>នៅក្រោម</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($categories as $cat)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->parent_name}}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{url('/admin/category/edit/'.$cat->id)}}" title="Edit"> កែប្រែ</a>
                                    <a class="btn btn-danger btn-xs" href="{{url('/admin/category/delete/'.$cat->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete">លុប</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection