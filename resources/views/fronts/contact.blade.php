@extends('layouts.frontfull')
@section('content')
    <div class="c-news"><span class="news font-KL">ទំនាក់ទំនង</span></div>
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>ប្រភេទនៃទំនាក់ទំនង</th>
                    <th>ឈ្មោះ</th>
                    <th>លេខទូរស័ព្ទ</th>
                    <th>អីុម៉ែល</th>
                </tr>
            </thead>
            <?php 
                $contacts = DB::table('contacts')
                    ->join('contact_types', 'contact_types.id', '=','contacts.id')
                    ->select('contacts.*','contact_types.name as contact_type_id')
                    ->orderBy('contacts.id', 'desc')
                    ->where('contacts.active',1)
                    ->get(); 
                $i = 1;
            ?>
            <tbody>
                @foreach($contacts as $con)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$con->contact_type_id}}</td>
                        <td>{{$con->name}}</td>
                        <td>{{$con->phone}}</td>
                        <td>{{$con->email}}</td>
                    </tr>        
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')

@endsection