<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>រដ្ឋបាល ខេត្តកំពង់ចាម</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/4-col-portfolio.css')}}" rel="stylesheet">
  </head>
  <body>

    <center><h1 style="margin-top: -45px; padding: 20px;" ><a class="text-danger" href="#">រដ្ឋបាល ខេត្តកំពង់ចាម</a></h1></center> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">ទំព័រដើម
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ព័ត៌មាន</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ទំនាក់ទំនងកិច្ចការរដ្ឋបាល​ </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">គម្រោង-ដៃគូអភិវឌ្ឌន៍ </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">រចនាសម្ព័ន្ធគ្រប់គ្រង </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">កម្រងឯកសារ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">វិស័យទេសចរណ៍</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">គំនិតច្នៃប្រឌិត</a>
            </li>
            
            
          </ul>
          <ul class="navbar-nav ml-auto" style="background: #fff;">
             <li class="nav-item">
              <a class="nav-link" href="#"> <img src="{{asset('front/img/kh.png')}}" width="25"> <img src="{{asset('front/img/en.png')}}" width="25"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluit background">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div id="demo" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php  $i = 1;
                $slides = DB::table('slides')->orderBy('order','asc')->where('active' ,1)->get();
                ?>
                @foreach($slides as $s)
                    @if($i == 1)
                    <div class="carousel-item  active">
                        <div class="slider-img"> <img src="{{asset('img/'.$s->photo)}}" alt="{{$s->name}}" width="100%"></div>
                    </div>
                    @else 
                    <div class="carousel-item ">
                        <div class="slider-img "> <img src="{{asset('img/'.$s->photo)}}" alt="{{$s->name}}" width="100%"></div>
                    </div>
                    @endif
                    <?php $i++;?>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
            </div>
            <div class="col-md-3">
              <div class="ad">សារលិខិតរបស់អភិបាល</div>
              <div class="pd">
                <img src="{{asset('front/img/3.jpg')}}" width="100%">
              </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
     <footer class="py-5 bg-dark">
     <div class="container">
       <p class="m-0 text-center text-white">Copyright &copy; រដ្ឋបាល ខេត្តកំពង់ចាម 2018</p>
     </div>
     <!-- /.container -->
   </footer>

   <!-- Bootstrap core JavaScript -->
   <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 </body>

</html>