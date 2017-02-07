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
	    cursor: pointer;
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
	.party{
		margin-bottom: 9px;
		color: grey;
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
      &#8678; Kembali Pilih Daerah Pemilihan
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
        <h1 class="heading _title-list">Apa Saja Kelebihan &amp; Kekurangan Masing-Masing Paslon?</h1>
        <h2 class="heading __sub-title-list">Jika Mereka Memimpin {{$prefix}} {{$election->place->name}} Periode 2017-2022</h2>
      </div>
    </div>
    @php
    	$couples = $election->couples->sortBy('order');
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
              	<div class="party">
              		{{$partai}}
              	</div>
              	<div class="g-plusone" data-size="standard" data-annotation="bubble" data-href="{{url($election->urlname."/".$c->order, [], $secure)}}" data-annotation="inline"></div>
              	<div class="fb-comments" data-href="https://wikikandidat.com/{{$c->election->urlname}}/{{$c->order}}" data-width="340" data-numposts="2" data-order-by="social"></div>
              	<a href="{{url($c->election->urlname."/".$c->order, [], $secure)}}" class="btn btn-primary-o btn-small">Baca Visi Misi {{$c->candidate->nickname}}-{{$c->running_mate->nickname}} &#8680;</a><br>
              	<a href="{{url($c->candidate->urlname, [], $secure)}}" class="btn btn-primary-o btn-small">Kenal {{$c->candidate->nickname}} Lebih Dekat<br>
              	(Riwayat Pendidikan &amp; Testimoni<br>tentang Kepribadiannya) &#8680;</a><br>
              	<a href="{{url($c->running_mate->urlname, [], $secure)}}" class="btn btn-primary-o btn-small">Kenal {{$c->running_mate->nickname}} Lebih Dekat<br>
              	(Riwayat Pendidikan &amp; Testimoni<br>tentang Kepribadiannya) &#8680;</a><br>
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
  <script type="text/javascript">
    $(document).ready(function(){
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
