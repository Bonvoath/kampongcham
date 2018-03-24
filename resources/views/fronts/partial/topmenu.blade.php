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