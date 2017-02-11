<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@section('title')
Kelebihan &amp; Kekurangan Kandidat {{$election->name}}
@endsection

@section('head')
<style type="text/css">

	.bungkus {
	    display:inline-block;
	    width: 100%;
	}

	.isi {
		width:374px;
	    display:inline-block;
	    background: #fff;
	    padding: 20px;
	    margin: 12px;
	    color: #373b3f;
	    border-radius: 6px;
	    box-shadow: 0px 0px 6px 0px #d6d6d6, 0px 10px 25px -10px #8fabe4;
	}

	h4{
		line-height: 137%;
	}

	label{
		font-size: small;
	}

	.candidate{
		font-size: larger;
		margin: 5px 0;
	}

	.running-mate{
		margin-bottom: 5px;
	}

	.small{
		margin-bottom: 9px;
		color: grey;
		font-size: small;
	}

	.isi .heading{
		text-align: left;
	    margin-top: 15px;
	    font-size: 1.1em;
	        line-height: 1.2em;
	}

	hr{
		margin-top: 17px;
	}
	.secret-panel{
		display: none;
		margin-top:10px;
		text-align: left;
	}
	.btn-small {
		font-size: 13px;
	}
</style>
@endsection

@section('content')
<div class="page-list">
  <div class="container">
  	<div style="text-align: center;">
  		@php
          //$videos = explode(", ", $election->description);
  			$videos = [];
        @endphp
        @foreach($videos as $v)
          <div class="col-sm-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$v}}" allowfullscreen></iframe>
            </div>
          </div>
        @endforeach
  	</div>
    <a href="{{url('/', [], $secure)}}" class="btn btn-primary-o">
      &#8678; Kembali untuk Lihat Daerah Pemilihan Lain
    </a>
    <div class="box title">
      <div class="text center">
      	@php
      	  if($election->place->level == 1)
            $prefix = "Prov.";
          if($election->place->level == 2)
            $prefix = "Kota";
          if($election->place->level == 3)
            $prefix = "Kab.";
      	@endphp
        <h1 class="heading _title-list">{{$prefix}} {{$election->place->name}}</h1>
      </div>
    </div>
    @php
    	$couples = $election->couples->sortBy('order');
    	if( count($couples) > 3 ){
    		$couples = $couples->shuffle();
    	}
    @endphp
    <div style="text-align: center;width: 100%;">
	    <div class="bungkus">
	    	@foreach($couples as $c)
		    <div class="isi">
		    	<div class="couple-avatar-paslon">
	              <div class="avatar">
	                <img src="{{$c->candidate->photo_url}}" alt="" class="img-cover">
	              </div>
	              <div class="avatar">
	                <img src="{{$c->running_mate->photo_url}}" alt="" class="img-cover">
	              </div>
	            </div>
	            <label>Nomor Urut {{$c->order}}</label>
              	<div class="candidate">{{$c->candidate->name}}</div>
              	<div class="running-mate">{{$c->running_mate->name}}</div>
              	@php
					$partai = "";
					$parties = $c->parties;
					if(count($parties) > 0){
						foreach ($parties as $p) {
							$partai .= $p->abbreviation.", ";
						}
						$partai = rtrim($partai, ", ");
					}else{
						$partai = "Independen";
					}
				@endphp
              	<div class="small">
              		{{$partai}}
              	</div>
              	<div class="g-plusone" data-size="standard" data-annotation="bubble" data-href="{{url($election->urlname."/".$c->order, [], $secure)}}" data-annotation="inline"></div>
              	<br>

              	<span class="btn btn-primary-o btn-small" 
              	data-type="visi-{{$c->id}}">Baca Visi, Misi, dan Program {{$c->candidate->nickname}}-{{$c->running_mate->nickname}}</span><br>
              	<div class="secret-panel visi-{{$c->id}} dont-break-out">
              		{!!$c->misi!!}
              	</div>

              	<span class="btn btn-primary-o btn-small" 
              	data-type="education-{{$c->candidate->urlname}}">Baca Riwayat Pendidikan dan Karir {{$c->candidate->nickname}}</span>
              	<div class="secret-panel education-{{$c->candidate->urlname}} dont-break-out">
              		@if($c->candidate->birthdate)
			        <div class="heading">Lahir</div>
			        <div class="small">
			            {{$c->candidate->birthcity}}, {{$c->candidate->birthdate}}
			        </div>
			        @endif
			        @if($c->candidate->pendidikan)
			        <div class="heading">Pendidikan</div>
			        <div class="small">
			            {!!$c->candidate->pendidikan!!}
			        </div>
			        @endif
			        @if($c->candidate->karir)
			        <div class="heading">Karir</div>
			        <div class="small">
			            {!!$c->candidate->karir!!}
			        </div>
			        @endif
			        @if($c->candidate->penghargaan)
			        <div class="heading">Penghargaan</div>
			        <div class="small">
			            {!!$c->candidate->penghargaan!!}
			        </div>
			        @endif
			        @if($c->candidate->sumber_pemerintah)
			        <div class="heading">Sumber Data di Atas (dari lembaga pemerintah)</div>
			        <div class="small">
			            {!!$c->candidate->sumber_pemerintah!!}
			        </div>
			        @endif
			        @if($c->candidate->sumber_non_pemerintah)
			        <div class="heading">Sumber Data di Atas (bukan dari lembaga pemerintah, verifikasi sendiri kebenarannya)</div>
			        <div>
			            {!!$c->candidate->sumber_non_pemerintah!!}
			        </div>
			        @endif
              	</div>
              	
              	<span class="btn btn-primary-o btn-small"
              	data-type="education-{{$c->running_mate->urlname}}">Baca Riwayat Pendidikan dan Karir {{$c->running_mate->nickname}}</span>
				<div class="secret-panel education-{{$c->running_mate->urlname}} dont-break-out">
					@if($c->running_mate->birthdate)
			        <div class="heading">Lahir</div>
			        <div class="small">
			            {{$c->running_mate->birthcity}}, {{$c->running_mate->birthdate}}
			        </div>
			        @endif
			        @if($c->running_mate->pendidikan)
			        <div class="heading">Pendidikan</div>
			        <div class="small">
			            {!!$c->running_mate->pendidikan!!}
			        </div>
			        @endif
			        @if($c->running_mate->karir)
			        <div class="heading">Karir</div>
			        <div class="small">
			            {!!$c->running_mate->karir!!}
			        </div>
			        @endif
			        @if($c->running_mate->penghargaan)
			        <div class="heading">Penghargaan</div>
			        <div class="small">
			            {!!$c->running_mate->penghargaan!!}
			        </div>
			        @endif
			        @if($c->running_mate->sumber_pemerintah)
			        <div class="heading">Sumber Data di Atas (dari lembaga pemerintah)</div>
			        <div class="small">
			            {!!$c->running_mate->sumber_pemerintah!!}
			        </div>
			        @endif
			        @if($c->running_mate->sumber_non_pemerintah)
			        <div class="heading">Sumber Data di Atas (bukan dari lembaga pemerintah, verifikasi sendiri kebenarannya)</div>
			        <div>
			            {!!$c->running_mate->sumber_non_pemerintah!!}
			        </div>
			        @endif
				</div>

				<hr>

              	<div class="heading">Ceritakan Pendapatmu Tentang Kelebihan dan Kekurangan {{$c->candidate->nickname}}-{{$c->running_mate->nickname}}...</div>
				<div class="small readmore" style="text-align: left;">
              		Pendapat kamu penting &amp; bermanfaat! Kenapa? Tulisan kamu pasti dibaca &amp; tidak akan tenggelam. Itu karena Facebook menaruh tulisan dari teman sendiri di tempat teratas. Saran: tulisan yang baik, adalah yang bisa kamu terima, saat kamu membacanya sebagai orang lain.
              	</div>
              	<div class="fb-comments" data-href="https://wikikandidat.com/{{$c->election->urlname}}/{{$c->order}}" data-width="340" data-numposts="2" data-order-by="social"></div>

              	<hr>

              	<div class="heading">Baca (&amp; Tulis) Pengakuan Orang-Orang Dekat tentang Kepribadian {{$c->candidate->nickname}} yang Sebenarnya</div>
              	<div class="small" style="text-align: left;">
              		Jangan melakukan pengakuan palsu. Masing-masing penulis bertanggung jawab atas apa yang ditulisnya.
              	</div>
              	<div class="fb-comments" data-href="https://wikikandidat.com/{{$c->candidate->urlname}}" data-width="340" data-numposts="2" data-order-by="social"></div>
              	              	
              	<hr>
              	
              	<div class="heading">Baca (&amp; Tulis) Pengakuan Orang-Orang Dekat tentang Kepribadian {{$c->running_mate->nickname}} yang Sebenarnya</div>
              	<div class="small" style="text-align: left;">
              		Jangan melakukan pengakuan palsu. Masing-masing penulis bertanggung jawab atas apa yang ditulisnya.
              	</div>
              	<div class="fb-comments" data-href="https://wikikandidat.com/{{$c->running_mate->urlname}}" data-width="340" data-numposts="2" data-order-by="social"></div>
		    </div>
		    @endforeach
		</div>
	</div>
    <!--
    <div class="box__comparison">
      <span id="show-compare-btn" class="btn btn-primary-o">Bandingkan Dua Pasangan</span>
      <form action="" id="compare-form" style="display: none;">
        <select id="first-select" style="width: 300px;">
          <option value=""></option>
          @foreach($couples as $c)
          	<option value="{{$c->candidate->urlname}}">{{$c->order}}) {{$c->candidate->nickname}} - {{$c->running_mate->nickname}}</option>
          @endforeach
        </select> vs 
        <select id="second-select" style="width: 300px;">
          <option value=""></option>
          @foreach($couples as $c)
          	<option value="{{$c->candidate->urlname}}">{{$c->order}}) {{$c->candidate->nickname}} - {{$c->running_mate->nickname}}</option>
          @endforeach
        </select><br><br>
        <span class="btn btn-primary-o compare-btn">
          Bandingkan Mereka
        </span>
      </form>
    </div> -->
  </div>
</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="{{asset('js/jquery.shorten.min.js', $secure)}}"></script>

  <script type="text/javascript">
    $(document).ready(function(){

    	$(".readmore").shorten({
			    moreText: 'Selengkapnya',
			    lessText: 'Ringkaskan',
			    showChars: 70,
			});

      $(".isi > span.btn").click(function(){
      	$( "."+$(this).data("type") ).slideToggle( "slow" );
      });

      $("#show-compare-btn").click(function(){
        $(this).fadeOut("fast", function(){
          $("#compare-form").animate({
              height: "toggle",
            });
        });
      });
      $("select").select2({
        placeholder : "Ketikan nama pasangan kandidat"
      });
      $(".compare-btn").click( function () {
      	if( $("#first-select").val() == "" ||
      	    $("#second-select").val() == "" || $("#second-select").val() == $("#first-select").val())
      	{
      		alert("Isi dulu ya, dua pasang kandidat berbeda yang ingin dibandingkan..")
      	}else
  	    {
  	    	window.location.href = "{{url('', [], $secure)}}/{{$election->urlname}}"+"/"+$("#first-select").val()+"--vs--"+$("#second-select").val();
  	    } 
      });
    });
  </script>
@endsection
