<!DOCTYPE html>
<html lang="en">
  <head>
    @include('fronts.partial.header')
  </head>
  <body>
    <center><div style="margin-top: -57px; magin-button: 5px; background: #cb0003;" ><a class="text-danger" href="{{url('/')}}"><img src="{{asset('front/img/Untitled-28.png')}}" width="100%"></a></div></center> 
    @include('fronts.partial.topmenu')
    <div class="container" style="padding: 10px 0;">
      @yield('content')
    </div>
    <footer class="py-5 bg-dark">
      <p class="m-0 text-center text-white">Copyright &copy; រដ្ឋបាល ខេត្តកំពង់ចាម 2018</p>
    </footer>
   <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   @yield('js')
 </body>
</html>