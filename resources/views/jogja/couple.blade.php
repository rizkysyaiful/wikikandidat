<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@php
	$c = $couple->candidate;
	$rm = $couple->running_mate;
@endphp

@section('title')
Alasan saya pilih {{$c->nickname}}-{{$rm->nickname}} di Pilkada {{$couple->election->name}}
@endsection

@section('head')
<style type="text/css">
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
        	<a href="{{url($c->urlname), [], $secure}}" class="btn btn-primary-o">Baca Riwayat Pendidikan &amp; <span class="fb-comments-count" data-href="https://wikikandidat.com/{{$c->urlname}}"></span> Pengakuan Orang tentang Kepribadian {{$c->nickname}}</a>	
        </p>
        <h3>{{$rm->name}} ({{$rm->nickname}})</h3>
        <p>
        	<a href="{{url($rm->urlname), [], $secure}}" class="btn btn-primary-o">Baca Riwayat Pendidikan &amp; <span class="fb-comments-count" data-href="https://wikikandidat.com/{{$c->urlname}}"></span> Pengakuan Orang tentang Kepribadian {{$rm->nickname}}</a>
        </p>
        <hr>
        @if($couple->slogan)
        <h3>Slogan</h3>
        <div>
        	{{$couple->slogan}}
        </div>
        @endif
        @if($couple->visi)
        <h3>Visi</h3>
        <div>
        	{!!$couple->visi!!}	
        </div>
        @endif
        @if($couple->misi)
        <h3>Misi</h3>
        <div>
        	{!!$couple->misi!!}
        </div>
        @endif
        @if($couple->program)
        <h3>Program</h3>
        <div>
        	{!!$couple->program!!}
        </div>
        @endif
        @if($couple->website)
        <h3>Website</h3>
        <p>
        	<a href="{!!$couple->website!!}">{!!$couple->website!!}</a>
        </p>
        @endif
        @if($couple->sumber)
        <h3>Sumber-Sumber Data di Atas</h3>
        <div>
        	{!!$couple->sumber!!}
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
        <div class="divider"></div><br>
        <div class="fb-like" data-href="https://wikikandidat.com/{{$couple->election->urlname}}/{{$couple->order}}" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
        
        <h1>Menurut Kamu, Apa Kelebihan dan Kekurangan Pasangan {{$c->nickname}}-{{$rm->nickname}}?</h1>
        <div class="fb-comments" data-href="https://wikikandidat.com/{{$couple->election->urlname}}/{{$couple->order}}" data-width="600" data-numposts="10" data-order-by="social"></div>
        <hr>
        @php
        	$couples = $couple->election->couples;
        @endphp
        @foreach($couples as $co)
			@if($co->id != $couple->id)
				<a href="{{url($co->election->urlname."/".$co->order, [], $secure)}}" class="btn btn-primary-o">
			      Kelebihan dan Kekurangan {{$co->candidate->nickname}}-{{$co->running_mate->nickname}} >>
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
