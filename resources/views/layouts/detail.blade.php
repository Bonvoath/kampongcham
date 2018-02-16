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
    <center><div style="margin-top: -57px; magin-button: 5px; background: #cb0003;" ><a class="text-danger" href="{{url('/')}}"><img src="{{asset('front/img/Untitled-28.png')}}" width="100%"></a></div></center> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php  $categories = DB::table('categories as a')
        ->leftjoin('categories as b','b.id','=','a.parent_id')
        ->select('a.*', 'b.name as parent_name')
        ->where('a.active',1)
        ->where('a.parent_id', 0)
        ->paginate(18);
      ?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">ទំព័រដើម
          </a>
        </li>
        @foreach($categories as $cat)
        <?php
            $subs = DB::table('categories')->where('active',1)->where('parent_id', $cat->id)->get();
        ?>
        <li class="nav-item">
          <a class="nav-link" href="{{url('page-by-category/'.$cat->id)}}"> @if(count($subs)<=0){{$cat->name}} @endif</a>
          @if(count($subs)>0)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               {{$cat->name}} 
              </a>
            <div class="dropdown-menu">
              @foreach($subs as $s)
                <a class="dropdown-item" href="{{url('page-by-category/'.$s->id)}}">{{$s->name}} </a>
              @endforeach
            </div>
          </li>
          @endif
        </li>
        @endforeach
        
      </ul>
          <ul class="navbar-nav ml-auto" style="background: #fff;">
             <li class="nav-item">
              <a class="nav-link" href="#"><img src="{{asset('front/img/kh.png')}}" width="25"> <img src="{{asset('front/img/en.png')}}" width="25"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluit background">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
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