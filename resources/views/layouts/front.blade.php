<!DOCTYPE html>
<html lang="en">
    <head>
        @include('fronts.partial.header')
    </head>
    <body>
        <center><div style="margin-top: -57px; magin-button: 5px; background: #cb0003;" ><a class="text-danger" href="{{url('/')}}"><img src="{{asset('front/img/Untitled-28.png')}}" width="100%"></a></div></center> 
        @include('fronts.partial.topmenu')
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div>
                        <?php
                            $i = 1;
                            $index = 0;
                            $slides = DB::table('slides')->orderBy('order','asc')->where('active' ,1)->get();
                        ?>
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($slides as $slide)
                                    @if($index == 0)
                                        <li data-target="#demo" data-slide-to="{{$index}}" class="active"></li>
                                    @else
                                        <li data-target="#demo" data-slide-to="{{$index}}"></li>
                                    @endif
                                    <?php $index++; ?>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($slides as $s)
                                    @if($i == 1)
                                        <div class="carousel-item active">
                                            <div class="slider-img">
                                                <img src="{{asset('uploads/slide/'.$s->photo)}}" alt="{{$s->name}}" width="100%">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>{{$s->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @else 
                                        <div class="carousel-item">
                                            <div class="slider-img">
                                                <img src="{{asset('uploads/slide/'.$s->photo)}}" alt="{{$s->name}}" width="100%">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>{{$s->name}}</h3>
                                                </div>
                                            </div>
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
                    <div>
                        @yield('content')
                    </div>
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
                    <div>
                        <div class="ad font-KL" style="margin-bottom:3px;"><i class="fa fa-upload" aria-hidden="true"></i> ទាញយកកម្មវិធីខេត្តកំពង់ចាម</div>
                        <div class="row">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.kravanh.app.AppKampongcham&h=ATMo-mIWGWjjqUG0YfPnvMAsDQ7bMA6vndzB0ilRXyB6XV7u_eb6A5n9ijU9XE7imjiIT3iSA7oR_0M3vSgPdJ8pS7IkCaQ9VCnvscZalEm4Y43IZf6-ww" style="line-height: 50px;"><img src="{{url('img/google.png')}}" width="100%"></a>
                                <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fitunes.apple.com%2Fcn%2Fapp%2Fkampongcham-administration%2Fid1376449951%3Fmt%3D8%26ign-mpt%3Duo%253D4&h=ATMo-mIWGWjjqUG0YfPnvMAsDQ7bMA6vndzB0ilRXyB6XV7u_eb6A5n9ijU9XE7imjiIT3iSA7oR_0M3vSgPdJ8pS7IkCaQ9VCnvscZalEm4Y43IZf6-ww" style="line-height: 50px;"><img src="{{url('img/apple.png')}}" width="100%"></a>
                            </div>
                            <div class="col-xs-5 col-sm-5 col-md-5" style="padding-left: 0;">
                                <a href="javascript:void(0)"><img src="{{url('img/qrcode.png')}}" width="100%"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5 bg-dark">
            <p class="m-0 text-center text-white">Copyright &copy; រដ្ឋបាល ខេត្តកំពង់ចាម 2018</p>
        </footer>
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