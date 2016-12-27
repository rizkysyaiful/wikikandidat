<?php
    $secure = App::environment('production') ? true : NULL;
?>
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
				'Skenario 1A: Rekam jejak baru &amp; jadi verifikator pertama',
				'1a',
				'<p>
					Anggaplah kamu sudah resmi jadi seorang verifikator Wikikandidat.
				</p>
				<p>
					Pada suatu hari, HP kamu berbunyi, "telolet telolet". Ada email masuk. Email itu ternyata dari Wikikandidat.
				</p>
				<p>
					Seseorang telah memasukan informasi baru ke Wikikandidat. Lalu, <a href="https://github.com/rizkysyaiful/wikikandidat/commit/10d3376fe652827645200eb4561c46c5adf8b0f9#diff-a518e07b7b176623eb0f989f8920e724R71" target="_blank">algoritma acak di Wikikandidat.com</a> telah menunjuk kamu untuk memverifikasi sebuah informasi tersebut. Dalam waktu dekat, kamu harus menunaikan tugas kamu.
				</p>
				<p style="text-align:center;">
					<img class="img-thumbnail" src="'.asset('img/spiderman-quote.jpg', $secure).'" width="400px" alt="spiderman quote">
				</p>
				<p>
					Link di email kamu membawa kamu ke halaman wikikandidat.com/verification. Di halaman itu, kamu melihat penampakan berikut.
				</p>
				<p style="text-align:center;">
					<img class="img-thumbnail" src="'.asset('img/pand-ver-1.png', $secure).'" width="550px">
				</p>
				<p>
					Dari situ kamu tahu, kalau pengguna Wikikandidat bernama Rizky Syaiful, ingin menambah rekam jejak karir kandidat bernama Hange Zoe.
				</p>
				<blockquote>
					<p>
						Hal pertama yang kamu lakukan adalah memahami informasi tersebut.
					</p>
				</blockquote>
				<p>
					Menurut kamu yang Rizky maksud adalah "Hange Zoe menjabat sebagai Komandan Pasukan Peninjau terhitung mulai tahun 2016". Rizky juga terlihat memberikan bukti dari website Wikia.com.
				</p>
				<blockquote>
					<p>
						Hal kedua: melihat apakah informasinya baru dan bermanfaat.
					</p>
				</blockquote>
				<p>
					Untuk itu, kamu pergi ke halaman personal kandidat tersebut. Alamat kandidat Hange Zoe adalah wikikandidat.com/hange. Kamu mendapatkannya dengan mengklik...
				</p>
				<p style="text-align:center;">
					<img class="img-thumbnail" src="'.asset('img/pand-ver-2-zoom-hange.png', $secure).'">
				</p>
				<p>
					Lalu, di halaman Hange Zoe, kamu akan melihat seluruh rekam jejak Hange.  
				</p>
				<p style="text-align:center;">
					<img class="img-thumbnail" src="'.asset('img/pand-ver-3-profil.png', $secure).'">
				</p>
				<p>
					Kamu akan fokus melihat bagian karir. Kamu lalu membayangkan informasi yang Rizky masukan tertulis di sana.
				</p>
				<p>
					Muncul pertanyaan dalam diri kamu, "Bermanfaatkah untuk pembaca Wikikandidat? Kalau <em>Komandan Pasukan Peninjau terhitung mulai tahun 2016</em> tertulis di sini?"
				</p>
				<p>
					Jangan lupa cek. Bisa jadi informasi tersebut sudah ada di halaman kandidat Hange sebelumnya. 
				</p>
				<p>

				</p>
				'
			],
			[
				'Skenario 1B: Kamu jadi verifikator kedua atau ketiga',
				'1b',
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
	<script src="{{asset('js/smooth-scroll.js', $secure)}}"></script>
	<script>
		smoothScroll.init();
	</script>
@endsection