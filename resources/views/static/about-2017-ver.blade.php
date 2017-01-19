<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
Tentang
@endsection

@section('content')
<div class="container reading">
	<h1 class="anchor" id="atas">Tentang Kami</h1>
	<?php
		$faq = [
			[
				'Kenapa?',
				'why',
				'
				<p>
					Sejarah menunjukan: pemimpin-pemimpin yang berhasil dan dicintai, adalah mereka yang memiliki "why" yang sama dengan rakyatnya. Tonton video berikut jika tidak percaya.
				</p>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qp0HIF3SfI4?hl=id-id&amp;cc_lang_pref=id-id&amp;cc_load_policy=1" allowfullscreen></iframe>
				</div>
				<blockquote>
					<p><strong>Kenapa kami membuat Wikikandidat?</strong></p>
					<p>
						<strong>Karena kami percaya rakyat Indonesia harus memilih berdasarkan impian terdalam ("why") si kandidat. Karena impian terdalam, adalah pemicu aksi-aksi besar seseorang di masa depan.</strong> 
					</p>
				</blockquote>
				<p>
					Masalahnya, sekarang, media massa masih jadi saluran informasi utama para kandidat ke pemilih. Apa yang salah? 
				</p>
				<ol>
					<li>Media massa bisa memihak&mdash;karena bisa dimiliki orang yang punya kepentingan politik.</li>
					<li>Manusia punya bias & sentimen. Artikel bohong&mdash;selama mendukung kandidat pujaan&mdash;bisa mudah sekali tersebar. <a href="https://www.buzzfeed.com/craigsilverman/how-macedonia-became-a-global-hub-for-pro-trump-misinfo" target="_blank">Bahkan pemilu terbaru di Amerika Serikat jadi bukti nyatanya</a>.</li>
					<li>Media massa online penuh dengan komentator-komentator anonim yang.. urgh.. lihat saja sendiri.</li>
					<li>Media massa hanya fokus menampilkan berita terbaru seputar janji-janji kampanye (dibanding riwayat hidup).</li>
				</ol>
				<p>
					Sementara...
				</p>
				<blockquote>
				<p>
					<strong>Kami juga percaya, impian terdalam seseorang, hanya bisa dilihat dari apa yang dia lakukan di masa lalu.</strong>
				</p>
				</blockquote>
				<p>
					Pidato fenomenal Martin Luther King Jr., <a href="https://www.youtube.com/watch?v=3vDWWy4CMhE" target="_blank">"I Have a Dream"</a>, mungkin tidak pernah ada, kalau jauh sebelumnya dia tidak ikut memimpin aksi <a href="https://en.wikipedia.org/wiki/Montgomery_bus_boycott" target="_blank">Boikot Bus Montgomery</a>&mdash;di umur 26.
				</p>
				<p>
					Kepemimpinan Mahatma Ghandi di India mungkin akan diragukan, jika dia tidak punya reputasi memperjuangkan HAM selama berkarir di Afrika Selatan&mdash;umur 24 sampai 43. 
				</p>
				<p>
					Lalu bayangkan ada orang yang tiba-tiba menyalonkan diri jadi presiden atau kepala desa, namun sepanjang hidupnya hanya terlihat memperkuat diri & keluarganya sendiri. Tentu tidak aneh, kalau publik menganggap impian terdalam beliau adalah "jadi orang penting".
				</p>
				<p>
					Naiknya pamor mekanisme pemilihan langsung adalah momentum yang bagus. Kita telah berhasil memaksa partai memilih figur non-kader. Partai telah belajar, pandangan bagus dari publik adalah nomor satu. 
				</p>
				<p>
					Sekarang, sudah saatnya menaikan level permainan. Sudah saatnya membuka mata rakyat, bahwa memilih berdasarkan "impian terdalam" adalah satu-satunya jalan, agar Indonesia punya pemimpin sebesar Martin Luther King Jr. atau Mahatma Ghandi.
				</p>
				<blockquote>
					<p>
						<strong>Karena sekarang, sudah ada teknologi internet di depan kita. Teknologi yang bisa jadi \'tempat menulis bersama\' rekam jejak &amp; impian terdalam seseorang.</strong>
					</p>
				</blockquote>
				',
			],
			[
				'Siapa di baliknya?',
				'siapa',
				'
				<p>
					Satu-satunya pihak yang resmi terafiliasi dengan Wikikandidat adalah Rizky Syaiful, seorang konsultan pengembangan software.
				</p>
				<p>
					Jauh sebelum memulai Wikikandidat di 2014, Rizky tidak pernah terafiliasi dengan pihak politik manapun. Alasan memulai Wikikandidat sendiri, hanya karena ingin memperbaiki sebuah inovasi KPU di Pileg 2014: Curriculum Vitae caleg yang hanya berbentuk scan PDF kertas tulis tangan. Rizky Syaiful sendiri tidak pernah mempublikasikan pilihan pribadinya terkait pemilu&mdash;silahkan googling sendiri.
				</p>
				<p>
					Mayoritas relawan mahasiswa Wikikandidat saat pileg 2014, berasal dari Kelompok Studi Mahasiswa Eka Prasetya UI. Kelompok studi berbasis keilmuan.
				</p>
				',
			]
		];
	?>
	<ul>
	@foreach($faq as $q)
		<li>
			<a data-scroll href="#{{$q[1]}}">
				{{$q[0]}}
			</a>
		</li>
	@endforeach
	</ul>
	@foreach($faq as $q)
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