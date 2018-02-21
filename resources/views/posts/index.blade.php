@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Post List&nbsp;&nbsp;
                    <a href="{{url('/post/create/new')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block" style="padding: 0;">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><input type="checkbox"/></th>
                                <th>ចំណងជើង</th>
                                <th>អ្នកបង្កើត</th>
                                <th>កាលបរិច្ឆេទ</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($posts as $p)
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td><a href="{{url('/post/edit/'.$p->id)}}" title="Edit">{{$p->title}}</a></td>
                                    <td>{{$p->create_by}}</td>
                                    <td>{{$p->create_at}}</td>
                                    <td>
                                        <a href="{{url('/post/view/'.$p->id)}}" title="Detail">Detail</a>
                                        
                                       <a href="{{url('/post/delete/'.$p->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection