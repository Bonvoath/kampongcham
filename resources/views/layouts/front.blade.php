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
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
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
      </div>
    </nav>
    <div class="container-fluit background">
    <br>
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
                        <div class="slider-img"> <img src="{{asset('uploads/slide/'.$s->photo)}}" alt="{{$s->name}}" width="100%"></div>
                    </div>
                    @else 
                    <div class="carousel-item ">
                        <div class="slider-img "> <img src="{{asset('uploads/slide/'.$s->photo)}}" alt="{{$s->name}}" width="100%"></div>
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
              <div class="ad font-KL">សារលិខិតរបស់អភិបាល</div>
              <?php $gov = DB::table('governor_histories')->orderBy('id', 'desc')->limit(1)->get();?>
              <div>
                @foreach($gov as $g)
                  <a href="#"><img src="{{url('uploads/govenor/'.$g->photo)}}" width="100%"></a>
                  <aside align="center">{{$g->name}}</aside>
                @endforeach
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
<script>
  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
    <script>
        function chLang(evt, ln)
        {
            evt.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{url('/')}}" + "/language/" + ln,
                success: function(sms){
                    if(sms>0)
                    {
                        location.reload();
                    }
                }
            });
        }
    </script>
     @yield('js')
 </body>
</html>