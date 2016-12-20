@extends('layouts.app')

@section('title')
Panduan Lengkap Verifikator
@endsection

@section('content')
<div class="container reading">
	<h1 class="anchor" id="atas">Panduan Lengkap Verifikator</h1>
	<?php
		$questions = [
			[
				'Apa sih inti pekerjaan verifikator?',
				'inti',
				'<p>
					Sebelumnya, terima kasih sudah tertarik jadi verifikator di Wikikandidat. Kamu tulang punggung Wikikandidat. Karena kamu, Wikikandidat jadi pusat informasi yang netral dan obyektif, juga lengkap namun tetap ringkas. 
				</p>
				<p>
					Sebagai verifikator di fase-fase awal lahirnya Wikikandidat, tentu selain melakukan verifikasi, kamu juga aktif menambahkan data.
				</p>
				<p>
					Terima kasih. Karena kamu, Wikikandidat ada.
				</p>
				<p>
					Jadi, intinya, kamu verifikator adalah pihak yang bertanggung jawab:
				</p>
				<ol>
					<li>
						Membaca poin yang diajukan oleh penambah data.</li>
					<li>
						Menilai apakah poin tersebut cukup bermanfaat untuk ditambahkan ke wikikandidat.com (kita punya standarnya)</li>
					<li>
						Jika iya, menilai apakah bukti penunjangnya cukup valid (kita juga punya standarnya). Kamu bisa melakukan riset mandiri jika dirasa perlu.</li>
					<li>
						Jika ada bukti yang valid, menuliskan poin yang diajukan tersebut&mdash;beserta bukti penunjangnya&mdash;yang nantinya akan tampil di Wikikandidat.com</li>
				</ol>
				<p>
					Semoga waktu dan energi yang kamu berikan selama melakukan verfikasi, terus bermanfaat buat orang lain.
				</p>
				'
			],
			[
				'Proses bisnis utama di Wikikandidat',
				'utama',
				'
				<p>
					Pertanyaan yang bagus, sebelum lebih detail tetang verifikator, mari kita lihat gambaran besarnya. Ada dua.
				</p>
				<p style="text-align:center;">
					<u><strong>1. Menambah Rekam Jejak Baru</strong></u>
					<br><br>
					<img class="img-thumbnail" src="https://docs.google.com/drawings/d/1JwhGfoW7582lcW9v3bgy9xOFrHRQtUvHjRW0CQdwKMg/pub?w=550&amp;h=590">
				</p>
				<br>
				<p style="text-align:center;">
					<u><strong>2. Memperbarui Rekam Jejak Lama</strong></u>
					<br><br>
					<img class="img-thumbnail" src="https://docs.google.com/drawings/d/1Pl1kD2thf_xg3nIn3PtWgzEe9bfnAS7b92rYp5iGV7s/pub?w=550&amp;h=590">
				</p>
				',
			],
			[
				'Skenario #1: Kamu jadi verifikator pertama',
				'pertama',
				'<p>
					Anggaplah kamu sudah resmi jadi seorang verifikator Wikikandidat.
				</p>
				<p>
					Pada suatu hari, HP kamu berbunyi. Ada email masuk. Email itu ternyata dari Wikikandidat.com.
				</p>
				<p>
					<a href="https://github.com/rizkysyaiful/wikikandidat/blob/master/app/Http/Controllers/UserController.php#L78" target="_blank">Algoritma acak di Wikikandidat.com</a> telah menunjuk kamu untuk memverifikasi sebuah data yang baru masuk. Dalam waktu dekat, kamu harus menunaikan tugas kamu.
				</p>
				<img class="img-thumbnail" src="http://55quotes.com/wp-content/uploads/2015/09/55Quotes.com-Great-Life-Power-Movies-Spiderman-1-686x361.jpg" width="400px" alt="">
				<p>
					Link di email kamu membawa kamu ke halaman wikikandidat.com/verification. Di sana, kamu melihat hal-hal seperti ini.
				</p>
				-- screenshot judul satu item verifikasi
				<p>
					<strong>1. Menilai apakah poin yang diajukan itu baru & bermanfaat buat pembaca.</strong> 
				</p>
				-- screenshot mengecek fakta di kandidat X dan kategori Y  
				<p>
					<strong>2. </strong>
				</p>'
			],
			[
				'Skenario #2: Kamu jadi verifikator kedua atau ketiga',
				'kedua-ketiga',
				'<p>
					
				</p>'
			]
		];
	?>
	<ul>
	@foreach($questions as $q)
		<li>
			<a data-scroll href="#{{$q[1]}}">
				{{$q[0]}}
			</a>
		</li>
	@endforeach
	</ul>
	@foreach($questions as $q)
		<span class="pull-right"><a data-scroll href="#atas">balik ke atas</a></span>
		<h5 class="anchor" id="{{$q[1]}}"><strong>{{$q[0]}}</strong></h5>
		{!!$q[2]!!}
	@endforeach
</div>
@endsection

@section('js')
	<script src="{{asset('js/smooth-scroll.js')}}"></script>
	<script>
		smoothScroll.init();
	</script>
@endsection