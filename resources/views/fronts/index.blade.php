@extends('layouts.front')
@section('content')
     <div class="row">
		<div class="col-md-9">
			<?php $news = DB::table('posts')->orderBy('id', 'desc')->where('active',1)->limit(12)->get();?>
			<div class="c-news">
				<span class="news">ព័ត៌មានថ្មីៗ</span> <a href="#" style="text-decoration: none;"><span class="text-danger"></span></a>
			</div>
			<hr class="hr-c">
			<div class="row">
				@foreach($news as $n)
				<div class="col-lg-4 col-md-4 col-sm-4 portfolio-item">
					<div class="card h-100">
						<a href="{{url('detail/'.$n->id)}}"><img class="card-img-top" src="{{asset('uploads/posts/250x250/'.$n->feature_image)}}" alt="feature image" width="100%"></a>
						<div class="card-body">
						<aside class="card-text"><a style="text-decoration: none; color: #555;" href="{{url('detail/'.$n->id)}}">{{$n->title}}</a></aside>
						</div>
						<div class="date">
						<img src="{{asset('front/img/date.png')}}" alt="date">  : {{$n->create_at}}
						</div>
					</div>
				</div>
				@endforeach
			</div>
	   </div>
	   <div class="col-md-3">
	   <?php $about_kampongchams = DB::table('about_kampongchams')->orderBy('id', 'desc')->where('active',1)->limit(20)->get();?>
			<br>
			<div class="pd3">អំពីខេតកំពង់ចាម</div>
			<div class="pd2">
				@foreach($about_kampongchams as $b)
					<a style="text-decoration: none; color: #555;" href="{{url('about-kampongcham/detail/'.$b->id)}}">
					<span class="text-danger"> 
						<b>></b> 
					</span> {{$b->title}} <hr>
					</a>
				@endforeach
			</div>
		</div>
    </div>
    
   </div>
     <!-- /.row -->
@endsection