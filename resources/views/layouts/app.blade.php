<?php
    $secure = App::environment('production') ? true : NULL;
?>
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

    <link rel="stylesheet" href="{{asset('css/bootstrap.css', $secure)}}" media="screen">
    <link rel="stylesheet" href="{{asset('css/custom.min.css', $secure)}}">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://bootswatch.com/bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="https://bootswatch.com/bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <style type="text/css">
        /** html tweak **/
        .anchor{
            padding-top: 60px;
            margin-top: -50px;
        }
        /** bootstrap tweak **/
        @media (min-width: 992px) {
            .container{
                max-width: 992px;
            }
        }
        @media (min-width: 1200px) {
            .container{
                max-width: 1200px;
            }
        }
        .container.reading{
            max-width: 650px;
        }
        .container.reading h5{
            line-height: 1.3;
        }
        .nav-pills > li > a:hover{
            background-color: transparent;
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
        div {
            /* These are technically the same, but use both */
            overflow-wrap: break-word;
            word-wrap: break-word;

            -ms-word-break: break-all;
            /* This is the dangerous one in WebKit, as it breaks things wherever */
            word-break: break-all;
            /* Instead use this non-standard one: */
            word-break: break-word;
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script >
      window.___gcfg = {
        lang: 'id'
      };
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    @yield('head')
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=1412350799013815";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div    class="navbar navbar-default navbar-fixed-top"
            @if(App::environment('local','staging'))
                style="background-color: #2c7eb9;"
            @endif
            >
      <div class="container">
        <div class="navbar-header">
          <span class="navbar-brand">Wikikandidat</span>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="{{url('/', [], $secure)}}">Pilkada 2017</a>
            </li>
            <li>
              <a href="http://wikikandidat.tumblr.com/post/82547489919/manfaat-kami-di-pemilu-legislatif-2014-jumlah" target="_blank">Kesuksesan Pileg 2014</a>
            </li>
            <li>
              <a href="{{url('tentang-kami', [], $secure)}}">Wikikandidat?</a>
            </li>
            <li>
              
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kontribusi <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{url('cara-kontribusi', [], $secure)}}">Sebagai Penambah Fakta</a></li>
                <li><a href="{{url('panduan-verifikasi', [], $secure)}}">Sebagai Verifikator (draft)</a></li>
                <li><a href="{{url('inisiator', [], $secure)}}">Sebagai Organisasi Inisiator</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li><a href="{{url('verification', [], $secure)}}">Tugas Verifikasi</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('user/'.Auth::user()->username, [], $secure)}}">Profil</a></li>
                        @if(Auth::user()->is_hibernate)
                            <li><a href="/hibernate-off">Keluar Mode Hibernate</a></li>
                        @else
                            <li><a href="/hibernate-on">Masuk Mode Hibernate</a></li>
                        @endif
                    </ul>
                </li>
                <li><a href="{{url('logout', [], $secure)}}">Logout</a></li>
            @else
                <li><a href="{{url('daftar', [], $secure)}}">Daftar</a></li>
                <li><a href="{{url('login', [], $secure)}}">Login</a></li>
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
    
    <footer class="footer">
        In collaboration with Ristek
    </footer>
    <!-- Scripts 
    <script src="/js/app.js"></script> -->

    <script src="{{asset('js/jquery-1.10.2.min.js', $secure)}}"></script>
    <script src="{{asset('js/bootstrap.min.js', $secure)}}"></script>
    <script src="{{asset('js/custom.js', $secure)}}"></script>

    @yield('js')

</body>
</html>
