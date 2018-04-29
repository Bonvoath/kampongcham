<script>
function BUrl(path)
{
    var base = "{{url('/')}}";
    
    return base + path;
}
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>
@yield('meta')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/4-col-portfolio.css')}}" rel="stylesheet">
<link href="{{asset('css/embed_font.css')}}" rel="stylesheet">