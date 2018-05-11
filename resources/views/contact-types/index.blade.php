@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> ប្រភេទទំនាក់ទំនង
                    <a href="{{url('/contact/type/create')}}" class="btn btn-link btn-sm">បន្ថែមថ្មី</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>ឈ្មោះ</th>
                                <th class="text-center">បង្ហាញមុខតំណែង</th>
                                <th class="text-center">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($contact_types as $c)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$c->name}}</td>
                                    <td class="text-center"><input type="checkbox" {{$c->use_job==true? 'checked':''}}></td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-primary" href="{{url('/contact/type/edit/'.$c->id)}}" title="Edit">កែប្រែ</a>
                                        <a class="btn btn-xs btn-danger"  href="{{url('/contact/type/delete/'.$c->id)}}" title="Delete">លុប</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{$contact_types->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection