<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@section('title')
{{$election->name}}
@endsection

@section('head')
@endsection

@section('content')
<div class="page-list">
  <div class="container">
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
        <h1 class="heading _title-list">Siapa yang Paling Layak Memimpin {{$prefix}} {{$election->place->name}}?</h1>
        <h2 class="heading __sub-title-list">Periode 2017-2022</h2>
      </div>
    </div>
    <div class="pure-g">
    @php
    	$couples = $election->couples->sortBy('order');
    @endphp
    @foreach($couples as $c)
      <div class="pure-u-1-3">
        <div class="couple-card-paslon __list">
          <a href="#">
            <div class="couple-avatar-paslon">
              <div class="avatar">
                <img src="{{$c->candidate->photo_url}}" alt="" class="img-cover">
              </div>
              <div class="avatar">
                <img src="{{$c->running_mate->photo_url}}" alt="" class="img-cover">
              </div>
            </div>
            <div class="couple-info-paslon">
              <label>Nomor Urut {{$c->order}}</label>
              <h4>{{$c->candidate->name}}</h4>
              <h4>{{$c->running_mate->name}}</h4>
            </div>
            <div class="g-plusone" data-size="tall" data-href="{{url($election->urlname."/".$c->order, [], $secure)}}" data-annotation="inline"></div>
          </a>
        </div>
      </div>
    @endforeach
    </div>
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
    </div>
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
