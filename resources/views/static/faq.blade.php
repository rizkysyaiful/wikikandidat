@extends('layouts.app')

@section('title')
F.A.Q
@endsection

@section('content')
<div class="container reading">
	<h2 id="vfaq">Very Frequently Asked Question<br><small>
	Yang Sering Sekali Ditanyakan</small></h2>
	<?php
		$faq = [
			[
				'Wikikandidat?',
				'apa-itu',
				'
				<p>
					Wikikandidat (kb): Sebuah produk digital yang menampilkan fakta positif dan negatif tentang seorang kandidat, yang lengkap karena bersumber dari publik luas, juga valid karena diverifikasi oleh mahasiswa.
				</p>
				',
			],
			[
				'Kelebihannya Dibanding Solusi Serupa?',
				'kelebihan',
				'
				<p>
					Pertanyaan yang bagus! :) 
				</p>
				<p>
					Sebagus pertanyaan <strong>"Kenapa Wikikandidat harus ada?"</strong>
				</p>
				<p>
					Dibanding media massa: Wikikandidat pasti tidak memihak. 
				</p>
				<p>
					Dibanding Wikipedia: Wikikandidat pasti ada bukti-bukti pendukung, juga diverifikasi oleh tiga mahasiswa secara acak. 
				</p>
				<p>
					Dibanding Linkedin atau website buatan tim sukses: Wikikandidat tidak bisa diubah semau yang bersangkutan. 
				</p>
				',
			],
			[
				'Siapa di Baliknya?',
				'siapa',
				'
				<p>
					Satu-satunya pihak yang resmi terafiliasi dengan Wikikandidat adalah Rizky Syaiful, seorang konsultan pengembangan software.
				</p>
				<p>
					Jauh sebelum memulai Wikikandidat di 2014, Rizky tidak pernah terafiliasi dengan pihak politik manapun. Alasan memulai Wikikandidat sendiri, adalah karena rasa salah sudah bangga golput di pemilu 2009. Rizky Syaiful netral dan tidak pernah mempublikasikan pilihan pribadinya di pemilu.
				</p>
				<p>
					Mayoritas relawan mahasiswa Wikikandidat saat pileg 2014, berasal dari Kelompok Studi Mahasiswa Eka Prasetya UI. Kelompok studi tersebut termasuk netral rekam jejak politiknya.
				</p>
				<p>
					Mahasiswa verifikator Wikikandidat di pilkada 2017, diseleksi secara khusus agar tidak punya sejarah afiliasi.
				</p>
				',
			],
		];
	?>
	<ul>
	@foreach($faq as $q)
		<li>
			<a href="#{{$q[1]}}">
				{{$q[0]}}
			</a>
		</li>
	@endforeach
	</ul>
	@foreach($faq as $q)
		<span class="pull-right"><a href="#vfaq">balik ke atas</a></span>
		<h5 id="{{$q[1]}}"><strong>{{$q[0]}}</strong></h5>
		{!!$q[2]!!}
	@endforeach
	<hr>
	<?php
		$faq = [
			[
				'Bukti Valid buat Verifikator Wikikandidat Seperti Apa?',
				'definisi-valid',
				'
				<ol>
					<li>
						Bukti langsung: contoh rekaman video, percakapan, atau dokumen bocoran yang sudah diinvestigasi kebenarannya oleh jurnalis dan aktifis luas.
					</li>
					<li>
						Apa yang disampaikan oleh media massa profesional dan bereputasi. <a href="https://en.wikipedia.org/wiki/Wikipedia:Identifying_reliable_sources#News_organizations" target="_blank">Kami mengikuti standar Wikipedia dalam hal ini</a>.
					</li>
				</ol>
				',
			],
			[
				'Kalau Bukti Fakta Ternyata Dinyatakan Tidak Valid Lagi?',
				'bukti-tidak-valid',
				'
				<p>
					Penjelasan fakta tersebut akan direvisi. Bukti penunjang akan ditambahkan ke fakta tersebut&mdash;ingat, satu fakta bisa memiliki lebih dari satu bukti.
				</p>
				<p>
					Tidak dihapusnya fakta akan berguna bagi mereka yang hanya tahu berita versi lama. Pergerakan sebuah isu akan terekam di Wikikandidat.
				</p>
				'
			],
			[
				'Cara jadi Verifikator?',
				'gabung-verifikator',
				'
				<p>
					Saat ini belum ada perekrutan terbuka. Yang pasti, syaratnya adalah mahasiswa aktif di program sarjana atau diploma.
				</p>
				',
			],
		];
	?>
	<h2 id="faq">Frequently Asked Question<br><small>
	Yang Sering Ditanyakan</small></h2>
	@foreach($faq as $q)
		<li>
			<a href="#{{$q[1]}}">
				{{$q[0]}}
			</a>
		</li>
	@endforeach
	</ul>
	@foreach($faq as $q)
		<span class="pull-right"><a href="#faq">balik ke atas</a></span>
		<h5 id="{{$q[1]}}"><strong>{{$q[0]}}</strong></h5>
		{!!$q[2]!!}
	@endforeach
	<hr>
</div>
@endsection