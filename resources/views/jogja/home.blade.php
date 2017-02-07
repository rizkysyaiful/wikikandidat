<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@section('title')
Home
@endsection

@section('head')
<style type="text/css">
    header.header-section:before{
        background: url({{asset('img/maps.png', $secure)}}) no-repeat center center;
    }
</style>
@endsection

@section('content')
	<header class="header-section">
	  <div class="container">
	    <h1 class="heading">Jangan Golput! Jangan Asal Pilih!</h1>
	    <h2 class="sub-heading">Di Tangan Kamu, Masa Depan Daerah Tercinta!</h2>
	    	<a id="doubt-btn" href="#" class="btn btn-primary-o">Apa kamu berfikir "Ah, tidak ada satu kandidatpun yang bagus..." ?</a>
	    	<p class="doubt-answer">
	    		Baca profil* seluruh kandidat di Wikikandidat. Boleh jadi ada yang kamu suka.
	    	</p>
	    	<p class="doubt-answer">
	    		Misal ternyata tidak ada yang lulus standar kamu, jangan golput. Pilih yang terbaik dari yang buruk-buruk. Lalu tulis <a href="#">petisi ini</a>&mdash;tentang pemimpin ideal menurut kamu.
	    	</p>
	    	<p class="doubt-answer">
	    		Beri pesan ke politikus Indonesia, bahwa dengan lahirnya Wikikandidat,<br>era pemilih cerdas &amp; kritis sudah dimulai.
	    	</p>
            <p class="doubt-answer">
                *) Ada fitur baru di Wikikandidat tahun ini! Testimoni! Kamu bisa baca pendapat teman-teman kamu (dan orang lain) tentang kepribadian seorang kandidat. Seru kan? ;)
            </p>
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
            narasi keren dimulai di sini...
	    <!--<ul class="link">
	      <li><a href="">Bandingkan Kandidat</a></li>
	      <li><a href="">Informasi Kandidat</a></li>
	    </ul>
		-->
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
