<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Wikikandidat</title>

    <!-- Styles 
    <link href="/css/app.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('css/custom.min.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://bootswatch.com/bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="https://bootswatch.com/bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <style type="text/css">
      .container.reading{
        max-width: 600px;
      }
      .alert{
        margin-top: -5px;
      }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('head')
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=125602920880407";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">Wikikandidat</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="#">Pilkada 2017</a>
            </li>
            <li>
              <a href="#">Pileg 2014</a>
            </li>
            <li class="dropdown">
              <a href="faq" id="faq">FAQ</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            <li><a href="home">Home</a></li>
            <li><a href="logout">Logout</a></li>
            @else
            <li><a href="register">Register</a></li>
            <li><a href="login">Login</a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>

    @if(session('status'))
    <div class="container">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{session('status')}}
        </div>
    </div>
    @endif

    @yield('content')

    <!-- Scripts 
    <script src="/js/app.js"></script> -->

    <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

    @yield('js')

</body>
</html>
