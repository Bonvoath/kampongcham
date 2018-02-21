@extends('layouts.front')
@section('content')
     <div class="row">
		<div class="col-md-9">
			<?php $news = DB::table('posts')->orderBy('id', 'desc')->where('post_type', 'post')->where('active',1)->paginate(12);?>
			<div class="c-news">
				<span class="news font-KL">ព័ត៌មានថ្មីៗ</span>
			</div>
			
			<div class="row" style="margin-top: 15px; background: #fff;">
				@foreach($news as $n)
				<div class="col-lg-4 col-md-4 col-sm-4 portfolio-item">
					<div class="card h-100">
						<a href="{{url('post/'.$n->id)}}"><img class="card-img-top" src="{{asset('uploads/posts/250x250/'.$n->feature_image)}}" alt="feature image" width="100%"></a>
						<div class="card-body">
						<aside class="card-text"><a style="text-decoration: none; color: #555;" href="{{url('post/'.$n->id)}}">{{$n->title}}</a></aside>
						</div>
						<div class="date">
						<img src="{{asset('front/img/date.png')}}" alt="date" width="13">   {{$n->create_at}}
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row"><span>ទំព័រ:</span>{{$news->links()}}</div>
	   </div>
	   <div class="col-md-3">
	   <?php $about_kampongchams = DB::table('posts')->orderBy('id', 'desc')->where('post_type','page')->where('active',1)->limit(20)->get();?>
			<br>
			<div class="pd3 font-KL">អំពីខេតកំពង់ចាម</div>
			<div class="pd2">
				@foreach($about_kampongchams as $b)
					<a style="text-decoration: none; color: #555;" href="{{url('page/'.$b->id)}}">
					<span class="text-danger"> 
					</span> {{$b->title}} <hr>
					</a>
				@endforeach
			</div>
		</div>
    </div>
   </div>
@endsection