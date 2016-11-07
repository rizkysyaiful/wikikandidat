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
        /** html tweak **/
        .anchor{
            padding-top: 50px;
            margin-top: -50px;
        }
        /** bootstrap tweak **/
        .container{
            width: 1200px !important;
          }
        .container.reading{
            max-width: 600px;
        }
        .container.reading h5{
            line-height: 1.3;
        }

        /** callout **/
        .bs-callout {
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #eee;
            border-left-width: 5px;
            border-radius: 3px;
        }
        .bs-callout h4 {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .bs-callout p:last-child {
            margin-bottom: 0;
        }
        .bs-callout code {
            border-radius: 3px;
        }
        .bs-callout+.bs-callout {
            margin-top: -5px;
        }
        .bs-callout-default {
            border-left-color: #777;
        }
        .bs-callout-default h4 {
            color: #777;
        }
        .bs-callout-primary {
            border-left-color: #428bca;
        }
        .bs-callout-primary h4 {
            color: #428bca;
        }
        .bs-callout-success {
            border-left-color: #5cb85c;
        }
        .bs-callout-success h4 {
            color: #5cb85c;
        }
        .bs-callout-danger {
            border-left-color: #d9534f;
        }
        .bs-callout-danger h4 {
            color: #d9534f;
        }
        .bs-callout-warning {
            border-left-color: #f0ad4e;
        }
        .bs-callout-warning h4 {
            color: #f0ad4e;
        }
        .bs-callout-info {
            border-left-color: #5bc0de;
        }
        .bs-callout-info h4 {
            color: #5bc0de;
        }
        
        .alert{
            margin-top: -5px;
        }
        .dont-break-out {
            /* These are technically the same, but use both */
            overflow-wrap: break-word;
            word-wrap: break-word;

            -ms-word-break: break-all;
            /* This is the dangerous one in WebKit, as it breaks things wherever */
            word-break: break-all;
            /* Instead use this non-standard one: */
            word-break: break-word;

            /* Adds a hyphen where the word breaks, if supported (No Blink) */
            -ms-hyphens: auto;
            -moz-hyphens: auto;
            -webkit-hyphens: auto;
            hyphens: auto;
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
<!--    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=125602920880407";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script> -->
    <div    class="navbar navbar-default navbar-fixed-top"
            @if(App::environment('local','staging'))
                style="background-color: #2c7eb9;">
            @endif
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FAQ <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a data-scroll href="faq#utama">Pertanyaan Utama</a></li>
                <li><a data-scroll href="faq#fakta-bukti">Ajukan Bukti Baru</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li><a href="verification">Verification</a></li>
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
