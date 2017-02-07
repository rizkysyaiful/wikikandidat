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
    
</style>
@endsection

@section('content')
<section class="page-personal">
    <div class="container">
      <div class="box-sidebar">
        <h5>{{$c->name}} ({{$c->nickname}})</h5>
        @if($c->birthdate)
        <p>
        	Lahir: {{$c->birthcity}}, {{$c->birthdate}}
        </p>
        @endif
        @if($c->pendidikan)
        <div>
        	{!!$c->pendidikan!!}
        </div>
        @endif
        <p>
        	<a href="#">Lebih lanjut tentang profil {{$c->nickname}} >></a>	
        </p>
        <h5>{{$rm->name}} ({{$rm->nickname}})</h5>
        @if($rm->birthdate)
        <p>
        	Lahir: {{$rm->birthcity}}, {{$rm->birthdate}}
        </p>
        @endif
        @if($rm->pendidikan)
        <div>
        	{!!$rm->pendidikan!!}
        </div>
        @endif
        <p>
        	<a href="#">Lebih lanjut tentang profil {{$rm->nickname}} >></a>
        </p>
        <hr>
        @if($couple->slogan)
        <h5>Slogan</h5>
        <p>
        	{{$couple->slogan}}
        </p>
        @endif
        @if($couple->visi)
        <h5>Visi</h5>
        <div>
        	{!!$couple->visi!!}	
        </div>
        @endif
        @if($couple->misi)
        <h5>Misi</h5>
        <div>
        	{!!$couple->misi!!}
        </div>
        @endif
        @if($couple->program)
        <h5>Program</h5>
        <div>
        	{!!$couple->program!!}
        </div>
        @endif
        @if($couple->website)
        <h5>Website</h5>
        <div>
        	{!!$couple->website!!}
        </div>
        @endif
        @if($couple->sumber)
        <h5>Sumber Data di Atas</h5>
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
        
        <h1>Alasan saya pilih {{$c->nickname}}-{{$rm->nickname}}...</h1>
        <div class="fb-comments" data-href="https://wikikandidat.com/{{$couple->election->urlname}}/{{$couple->order}}" data-width="600" data-numposts="10"></div>
        <hr>
        @php
        	$couples = $couple->election->couples;
        @endphp
        @foreach($couples as $co)
			@if($co->id != $couple->id)
				<a href="{{url($co->election->urlname."/".$co->order, [], $secure)}}" class="btn btn-primary-o">
			      Lihat alasan orang-orang memilih pasangan {{$co->candidate->nickname}}-{{$co->running_mate->nickname}} >>
			    </a>
			@endif
        @endforeach
      </div>
    </div>
  </section>
@endsection

@section('javascript')
	<script type="text/javascript" src="https://raw.githubusercontent.com/viralpatel/jquery.shorten/master/src/jquery.shorten.min.js"></script>
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
