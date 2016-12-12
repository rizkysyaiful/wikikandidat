@extends('layouts.app')

@section('title')
Contoh Edit Teks 
@endsection

@section('head')
<style type="text/css">
	ol,ul{
        padding-left: 17px;
    }
    textarea{
    	width: 100%;
    }
</style>
@endsection

@section('content')
	<div class="container reading">
		<h1>
			Contoh<br>
			<small>untuk Verifikator dalam Mengedit Sebuah Fakta</small>
		</h1>
		
		<h3 id="#format-tulisan">Format Tulisan</h3>
		<hr>

		<h4><strong>Fakta yang hanya satu poin</strong></h4>
		<div class="row">
			<?php
				$text = "Manajer operasional warteg Goyang Lidah.<sup>[soni.com](http://websitepribadisoni.com/curriculum-vitae)</sup>";
			?>
			<div class="col-md-6">
				Tulisan Verifikator:<br>
				<div class="well well-sm">
					{{$text}}
				</div>
			</div>
			<div class="col-md-6">
				Kemunculan di Wikikandidat.com:<br>
				<div class="well well-sm">
					{!!markdown($text)!!}
				</div>
			</div>
		</div>

		<h4><strong>Beberapa poin yang digabung ke satu fakta karena relevan</strong></h4>
		<div class="row">
			<?php
				$text = "Ketua Asosiasi Warteg-Warteg Indonesia.<sup>[Tempo.co](http://artikelonline.com/soni-diangkat-aws)</sup> Menyumbang total 2 miliar rupiah selama masa jabatan.<sup>[Harian Kompas](http://fotoartikeldikoran.com/)</sup>";
			?>
			<div class="col-md-6">
				Tulisan Verifikator:<br>
				<div class="well well-sm">
					{{$text}}
				</div>
			</div>
			<div class="col-md-6">
				Kemunculan di Wikikandidat.com:<br>
				<div class="well well-sm">
					{!!markdown($text)!!}
				</div>
			</div>
		</div>

		<h4><strong>Fakta dengan alur kronologis</strong></h4>
		<div class="row">
			<?php
$text = "1. Di sesi talk show Punch Bobby, 2 Desember 2021, Soni menyebutkan peraturan pemda terkait izin pendirian warteg adalah hasil lobi Asosiasi Pengusaha Warung Sunda (APWS).<sup>[Punch Bobby](http://youtupe.com/video-cuplikan)</sup><br>
1. Besoknya, APWS mengecam keras penyataan sepihak dari Soni.<sup>[APWS.or.id](http://apws.or.id/berita-123)</sup><br>
1. Lewat twit-nya, Soni minta maaf, dia baru tahu kalau pernyataan di Punch Bobby ternyata kabar burung.<sup>[soniwarteg](http://twitter.com/soniwarteg/status/912839345)</sup>";
			?>
			<div class="col-md-6">
				Tulisan Verifikator:<br>
				<div class="well well-sm">
					{!!str_replace(array('<sup>','</sup>'), array('&lt;sup&gt;', '&lt;/sup&gt;'), $text)!!}
				</div>
			</div>
			<div class="col-md-6">
				Kemunculan di Wikikandidat.com:<br>
				<div class="well well-sm">
					{!!markdown(str_replace("<br>", "", $text))!!}
				</div>
			</div>
		</div>
	</div>
@endsection