<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@php
	$c = $couple->candidate;
	$rm = $couple->running_mate;
@endphp

@section('title')
Kelebihan &amp; Kekurangan {{$c->nickname}}-{{$rm->nickname}} Menurut Teman Facebook Kamu
@endsection

@section('head')
<style type="text/css">
	h1{
        line-height: 124%;
    }
    h3{
    	margin-top: 17px;
    	margin-bottom: 10px;
    }
    hr{
    	margin-top: 15px;
    		margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<section class="page-personal">
    <div class="container">
      <div class="box-sidebar">
        <h3>{{$c->name}} ({{$c->nickname}})</h3>
        <p>
        	<a href="{{url($c->urlname), [], $secure}}" class="btn btn-primary-o">Baca Riwayat Pendidikan &amp;<br><span class="fb-comments-count" data-href="https://wikikandidat.com/{{$c->urlname}}"></span> Testimoni Orang tentang Kepribadian {{$c->nickname}} &#8680;</a>	
        </p>
        <h3>{{$rm->name}} ({{$rm->nickname}})</h3>
        <p>
        	<a href="{{url($rm->urlname), [], $secure}}" class="btn btn-primary-o">Baca Riwayat Pendidikan &amp;<br><span class="fb-comments-count" data-href="https://wikikandidat.com/{{$c->urlname}}"></span> Testimoni Orang tentang Kepribadian {{$rm->nickname}} &#8680;</a>
        </p>
        <hr>
        @if($couple->slogan)
        <h3>Slogan</h3>
        <div>
        	{{$couple->slogan}}
        </div>
        @endif
        @if($couple->visi)
        <h3>Visi, Misi, & Program Kerja</h3>
        <div>
        	{!!$couple->visi!!}	
        </div>
        @endif
        <h3>Website</h3>
        <div >
        	<a href="{!!$couple->website!!}">{!!$couple->website!!}</a>
        </div>
        @endif
      </div>
      <div class="box-content">
      	<div class="couple-avatar-paslon-main" style="text-align: center;">
            <div class="avatar">
              <img src="{{$c->photo_url}}" alt="" class="img-cover">
            </div>
            <div class="avatar">
              <img src="{{$rm->photo_url}}" class="img-cover">
            </div>
        </div>
        @php
			$partai = "";
			$parties = $couple->parties;
			if(count($parties) > 0){
				foreach ($parties as $p) {
					$partai .= $p->abbreviation.", ";
				}
				$partai = rtrim($partai, ", ");
			}else{
				$partai = "Independen";
			}
		@endphp
        <div style="margin-top: 10px;">
        	{{$partai}}
        </div>
        <div class="divider"></div><br>
        <div class="g-plusone" data-size="standard" data-annotation="bubble" data-href="https://wikikandidat.com/{{$couple->election->urlname}}/{{$couple->order}}" data-annotation="inline"></div>
        
        <h1>Menurut Kamu, Apa Kelebihan dan Kekurangan Pasangan {{$c->nickname}}-{{$rm->nickname}}?</h1>
        <div class="fb-comments" data-href="https://wikikandidat.com/{{$couple->election->urlname}}/{{$couple->order}}" data-width="600" data-numposts="10" data-order-by="social"></div>
        <hr>
        <a href="{{url($couple->election->urlname, [], $secure)}}" class="btn btn-primary-o">
            &#8678; Kembali Lihat Seluruh Pasangan di {{$couple->election->place->name}}
        </a>
        <br><br>
        @php
        	$couples = $couple->election->couples;
        @endphp
        @foreach($couples as $co)
			@if($co->id != $couple->id)
				<a href="{{url($co->election->urlname."/".$co->order, [], $secure)}}" class="btn btn-primary-o">
			      Kelebihan dan Kekurangan {{$co->candidate->nickname}}-{{$co->running_mate->nickname}} (<span class="fb-comments-count" data-href="https://wikikandidat.com/{{$co->election->urlname."/".$co->order}}"></span> Pendapat)
			    </a><br>
			@endif
        @endforeach
      </div>
    </div>
  </section>
@endsection

@section('javascript')
	<script type="text/javascript" src="{{asset('js/jquery.shorten.min.js', $secure)}}"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".box-sidebar > div").shorten({
			    moreText: 'selengkapnya',
			    lessText: 'ringkaskan',
			    showChars: 200,
			});
		});
	</script>
@endsection