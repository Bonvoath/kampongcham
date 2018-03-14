<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
        function BUrl(path)
        {
          var base = "{{url('/')}}";

          return base + path;
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>រដ្ឋបាល ខេត្តកំពង់ចាម</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/4-col-portfolio.css')}}" rel="stylesheet">
    <link href="{{asset('css/embed_font.css')}}" rel="stylesheet">
  </head>
  <body>
    <center><div style="margin-top: -57px; magin-button: 5px; background: #cb0003;" ><a class="text-danger" href="{{url('/')}}"><img src="{{asset('front/img/Untitled-28.png')}}" width="100%"></a></div></center> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php  $menus = DB::table('menus')->get(); ?>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav font-KL">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">{{trans("labels.home")}}
              </a>
            </li>
            @foreach($menus as $menu)
            <li class="nav-item">
              <a class="nav-link" href="{{asset($menu->url)}}">{{$menu->name}}</a>
            </li>
            @endforeach
          </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluit">
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
                </div>
                <div class="col-md-3">
                  <div class="ad font-KL">សារលិខិតរបស់អភិបាល</div>
                    <?php $gov = DB::table('governor_histories')->orderBy('id', 'desc')->limit(1)->get();?>
                    <div>
                    @foreach($gov as $g)
                      <a href="#"><img src="{{url('uploads/govenor/'.$g->photo)}}" width="100%" title="{{$g->name}}"></a>
                    @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; រដ្ឋបាល ខេត្តកំពង់ចាម 2018</p>
      </div>
    </footer>
   <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   @yield('js')
 </body>
</html>