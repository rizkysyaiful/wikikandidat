<?php
    $secure = App::environment('production') ? true : NULL;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="robots" content="index,nofollow" />
    <meta name="copyright" content="Copyright © 2017" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title') | Wikikandidat</title>

    <!--<meta name="keywords" content="#" />
    <meta name="url" content="#" />
    <meta name="description" content="#" />

    <meta name="twitter:card" content="app">
    <meta name="twitter:site" content="@#" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:url" content="#">
    <meta name="twitter:title" content="#">
    <meta name="twitter:description" content="#">
    <meta name="twitter:image" content="##">


    <meta property="og:url" content="#" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="#" />
    <meta property="og:description" content="#" />
    <meta name="author" content="#">
    <meta name="csrf-token" content="#" />
    <meta name="image:Logo" content="#"/>
    <meta property="og:image" content="#"/>

    <link rel="canonical" href="#" />

    <link rel="apple-touch-icon" sizes="57x57" href="'images/fav/apple-icon-57x57.png'">
    <link rel="apple-touch-icon" sizes="60x60" href="'images/fav/apple-icon-57x57.png'">
    <link rel="apple-touch-icon" sizes="72x72" href="'images/fav/apple-icon-72x72.png'">
    <link rel="apple-touch-icon" sizes="76x76" href="'images/fav/apple-icon-76x76.png'">
    <link rel="apple-touch-icon" sizes="114x114" href="'images/fav/apple-icon-114x114.png'">
    <link rel="apple-touch-icon" sizes="120x120" href="'images/fav/apple-icon-120x120.png'">
    <link rel="apple-touch-icon" sizes="144x144" href="'images/fav/apple-icon-144x144.png'">
    <link rel="apple-touch-icon" sizes="152x152" href="'images/fav/apple-icon-152x152.png'">
    <link rel="apple-touch-icon" sizes="180x180" href="'images/fav/apple-icon-180x180.png'">
    <link rel="icon" type="image/png" sizes="192x192"  href="'images/fav/android-icon-192x192.png'">
    <link rel="icon" type="image/png" sizes="32x32" href="'images/fav/favicon-32x32.png'">
    <link rel="icon" type="image/png" sizes="96x96" href="'images/fav/favicon-96x96.png'">
    <link rel="icon" type="image/png" sizes="16x16" href="'images/fav/favicon-16x16.png'">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="'images//ms-icon-144x144.png'">
    <meta name="theme-color" content="#ffffff"> -->

    <link rel="stylesheet" href="{{asset('css/app.css', $secure)}}">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:700,300i|Montserrat" rel="stylesheet">

    <link href="https://select2.github.io/dist/css/select2.min.css" rel="stylesheet">

    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-8256551-6', 'auto');
	  ga('send', 'pageview');

	</script>

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
    <nav class="navigation">
      <div class="container">
        <ul class="menu">
          <ul>
            <li>
              <a href="{{url('/', [], $secure)}}"><img src="{{asset('img/logo.png', $secure)}}" alt=""></a>
            </li>
          </ul>
        </ul>
      </div>
    </nav>

	@yield('content')
 
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
 	<script type="text/javascript" src="https://select2.github.io/dist/js/select2.full.js"></script>
  	@yield('javascript')
  </body>
</html>