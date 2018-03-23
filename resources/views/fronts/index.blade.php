@extends('layouts.front')
@section('content')
	<div class="c-news"><span class="news font-KL">ព័ត៌មានថ្មីៗ</span></div>
    <div class="row">
		@foreach($posts as $post)
			<div class="col-lg-4 col-md-4 col-sm-4 portfolio-item">
				<div class="card h-100">
					<a href="{{url('post/'.$post->id)}}"><img class="card-img-top" src="{{asset('uploads/posts/250x250/'.$post->feature_image)}}" alt="feature image" width="100%"></a>
					<div class="card-body">
						<aside class="card-text"><a style="text-decoration: none; color: #555;" href="{{url('post/'.$post->id)}}">{{$post->title}}</a></aside>
					</div>
					<div class="date">
						<img src="{{asset('front/img/date.png')}}" alt="date" width="13">{{$post->create_at}}
					</div>
				</div>
			</div>
		@endforeach
	</div>
   <div class="row">
		<div class="col-md-12">
			{{$posts->links()}}
		</div>
	</div>
@endsection