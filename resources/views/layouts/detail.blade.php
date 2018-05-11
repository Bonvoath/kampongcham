<!DOCTYPE html>
<html lang="en">
  <head>
    @include('fronts.partial.header')
  </head>
  <body>
    <center><div style="margin-top: -57px; magin-button: 5px; background: #cb0003;" ><a class="text-danger" href="{{url('/')}}"><img src="{{asset('front/img/Untitled-28.png')}}" width="100%"></a></div></center> 
    @include('fronts.partial.topmenu')
    <div class="container">
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
                </div>
                <div class="col-md-3">
                    <div class="ad font-KL text-center">សារលិខិតរបស់អភិបាល</div>
                    <?php $gov = DB::table('governor_histories')->orderBy('id', 'desc')->limit(1)->get();?>
                    <div>
                        @foreach($gov as $g)
                        <a href="#"><img src="{{url('uploads/govenor/'.$g->photo)}}" width="100%"></a>
                        @endforeach
                    </div>
                    <div>
                        <div class="ad font-KL"><i class="fa fa-calendar" aria-hidden="true"></i> កាលវិភាគថ្នាក់ដឹកនាំ</div>
                    </div>
                    <div>
                        <div class="ad font-KL"><i class="fa fa-desktop" aria-hidden="true"></i> ប្រព័ន្ធគ្រប់គ្រងទិន្នន័យរដ្ឋបាល</div>
                    </div>
                    <div>
                        <div class="ad font-KL"><i class="fa fa-volume-up" aria-hidden="true"></i> សំលេងប្រជាពលរដ្ឋ</div>
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