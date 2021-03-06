<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@section('title')
Home
@endsection

@section('head')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
    header.header-section:before{
        background: url({{asset('img/maps.png', $secure)}}) no-repeat center center;
    }
</style>
@endsection

@section('content')
	<header class="header-section">
	  <div class="container">
	    <h1 class="heading" style="margin-top: 0px;">Jangan Golput! Jangan Asal Pilih!</h1>
	    <h2 class="sub-heading">Di Tangan Kamu, Masa Depan Daerah Tercinta!</h2>
        <h2 class="sub-heading" style="color:grey;">Dengan Wikikandidat,<br>kamu dan teman-teman bisa baca &amp; berbagi informasi.<br>Kamu juga bisa baca visi-misi, program kerja, &amp; riwayat pendidikan kandidat.</h2>

    	<form action="" class="default-form">
	      <div class="search">
	      	<select>
	      	  <option value=""></option>
              @php
                $elections = App\Election::all();
                $elections = $elections->sortBy('urlname');
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
<!--
        <a id="doubt-btn" href="#" class="btn btn-primary-o">Apa kamu berfikir "Ah, tidak ada satu kandidatpun yang bagus..." ?</a>
        <p class="doubt-answer">
            Baca dulu profil seluruh kandidat di Wikikandidat. Boleh jadi ada yang kamu suka.
        </p>
        <p class="doubt-answer">
            Misal ternyata tidak ada yang lulus standar kamu, jangan golput. Pilih yang terbaik dari yang buruk-buruk. Lalu <a href="https://docs.google.com/forms/d/e/1FAIpQLScmHaa5exdSqwKOuPvTrc4_v696vadY7iCRXYdscogotX1GXg/viewform" target="_blank">isi survey ini</a>&mdash;tentang pemimpin ideal menurut kamu.
        </p>
        <p class="doubt-answer">
            Beri pesan ke politikus Indonesia, bahwa dengan lahirnya Wikikandidat,<br>era pemilih cerdas &amp; kritis sudah dimulai. Mudah-mudahan mulai mencari kandidat-kandidat yang lulus standar kita.
        </p>
-->

        <p style="padding-bottom: 0px;margin-top: -15px;">
            Kami <a href="http://wikikandidat.tumblr.com/" target="_blank">sudah ada sejak 2014</a>, kami punya visi besar, dan kami serius. Klik gambar di bawah ini.
        </p>

	    <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLScmHaa5exdSqwKOuPvTrc4_v696vadY7iCRXYdscogotX1GXg/viewform"><img src="{{asset('img/banner-survey.png', $secure)}}" width="899" height="170"></a>
        </div>
	  </div>
	</header>
@endsection

@section('javascript')
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
				placeholder : "Ketikan nama daerah tercinta, untuk melihat para kandidat Pilkada 2017"
			});
			$('select').on('select2:select', function (evt) {
			  window.location.href = "{{url('', [], $secure)}}/"+$(this).val();
			});
		});
	</script>
@endsection
