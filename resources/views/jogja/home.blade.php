<?php
    $secure = App::environment('production') ? true : NULL;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,nofollow" />
    <meta name="copyright" content="Copyright © 2017" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate" />
    <title>Wikikandidat</title>

    <meta name="keywords" content="#" />
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
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{asset('css/jogja-app.css', $secure)}}">
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

    <style type="text/css">
        header.header-section:before{
            background: url({{asset('img/maps.png', $secure)}}) no-repeat center center;
        }
    </style>


  </head>
  <body>
    <nav class="navigation">
      <div class="container">
        <ul class="menu">
          <ul>
            <li>
              <a href=""><img src="{{asset('img/logo.png', $secure)}}" alt=""></a>
            </li>
          </ul>
        </ul>
      </div>
    </nav>
	<header class="header-section">
	  <div class="container">
	    <h1 class="heading">Jangan Golput! Jangan Asal Pilih!</h1>
	    <h2 class="sub-heading">Di Tangan Kamu, Masa Depan Daerah Tercinta!</h2>
	    	<a id="doubt-btn" href="#" class="btn btn-primary-o">Apa kamu berfikir "Ah, tidak ada satu kandidatpun yang bagus..." ?</a>
	    	<p class="doubt-answer">
	    		Baca profil seluruh kandidat di Wikikandidat. Boleh jadi ada yang kamu suka.
	    	</p>
	    	<p class="doubt-answer">
	    		Misal ternyata tidak ada yang lulus standar kamu, jangan golput. Pilih yang terbaik dari yang buruk-buruk. Tulis <a href="#">petisi ini</a>&mdash;tentang pemimpin ideal menurut kamu.
	    	</p>
	    	<p class="doubt-answer">
	    		Beri pesan ke politikus Indonesia, bahwa dengan lahirnya Wikikandidat,<br>era pemilih cerdas &amp; kritis sudah dimulai.
	    	</p>
	    	<form action="" class="default-form">
		      <div class="search">
		      	<select>
		      	  <option value=""></option>
                  @php
                    $elections = App\Election::all();
                  @endphp
                  @foreach($elections as $e)
				    <option value="{{$e->urlname}}">{{$e->name}}</option>
                  @endforeach
				</select>
		      	<!--
		        <input type="text" placeholder="Ketikan nama daerah tercinta, untuk melihat kandidat Pilkada 2017">
		        <button><i class="ion-android-search"></i></button>
		        -->
		      </div>
	    	</form>
	    <!--<ul class="link">
	      <li><a href="">Bandingkan Kandidat</a></li>
	      <li><a href="">Informasi Kandidat</a></li>
	    </ul>
		-->
	  </div>
	</header>
	<script type="text/javascript" src="https://select2.github.io/dist/js/select2.full.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#doubt-btn").click(function(){
				$(this).fadeOut("fast", function(){
					$(".doubt-answer").animate({
					    height: "toggle",
					  });
				});
			});
			$("select").select2({
				placeholder : "Ketikan nama daerah tercinta, untuk melihat kandidat Pilkada 2017"
			});
			$('select').on('select2:select', function (evt) {
			  window.location.replace("{{url('qa', [], $secure)}}/"+$(this).val());
			});
		});
	</script>
  </body>
</html>
