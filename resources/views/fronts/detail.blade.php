@extends('layouts.front')
@section('content')
<link href="{{asset('front/bootstrap/bootstrap3.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/detail.css')}}" rel="stylesheet">
<section class="single-product">
    <div class="row mt-20">
        <div class="col-md-6">
             <!-- Wrapper for slides -->
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
                <?php $i = 1;?>
                @foreach($photos as $p)
                    @if($i==1)
                    <div class="item active">
                            <img src="{{asset('uploads/products/540x540/'.$p->file_name)}}" alt='product image' width="100%">
                        </div>
                    @else
                        <div class='item'>
                            <img src="{{asset('uploads/products/540x540/'.$p->file_name)}}" alt='product image' width="100%">
                        </div>
                    @endif
                    @php($i++)
                @endforeach
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    </a>
            </div>
             </div>
            <p>
                {!!$product->description!!}
            </p>
        </div>
        <div class="col-md-6">
            <div class="product-name">
                <h5>
                  {{$product->name}} (<span class="text-danger">Code={{$product->id}}</span>)
                </h5><hr>
                <p>
                    {{$product->short_description}}
                </p>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Price: </div><span class="line-through">$ {{$product->out_price}} </span>
                </div>
                <div class="row pro-vdoo">
                    <?php 
                        $p = $product->out_price *(1-$product->discount/100);
                    ?>
                    <div class="col-md-2">Discount: </div><span class="price">{{$product->discount}}% = ${{$p}}</span> 
                </div>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Category: </div><b>{{$product->category_name}}</b></span> 
                </div>
            </div><br>
            <?php $contact_info = DB::table('contact_info')->where('active',1)->get(); ?>
        
            @foreach($contact_info as $c)
            <h4 class="text-primary">{{$c->title}}</h4><hr>
            <aside>{!!$c->description!!}</aside>
            @endforeach
        </div>
    </div>
</div><br>
<script src="{{asset('front/js/jquery-git.min.js')}}"></script>   
<script src="{{asset('front/bootstrap/bootstrap3.min.js')}}"></script>
@endsection