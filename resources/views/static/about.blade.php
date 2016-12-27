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
					<strong>Kami juga percaya, impian terdalam seseorang, hanya bisa dilihat dari aksi-aksi besarnya di masa lalu.</strong>
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
				<p>
					Karena sekarang, sudah ada teknologi internet di depan kita. Teknologi yang memungkinkan adanya \'tempat menulis bersama\' rekam jejak &amp; impian terdalam seseorang.
				</p>
				<p>
					Kalau kamu juga percaya apa yang kami percayai, tolong bantu Wikikandidat.
				</p>
				',
			],
			[
				'Wikikandidat?',
				'apa-itu',
				'
				<p>
					Wikikandidat (kb): Sebuah produk digital yang menampilkan fakta positif dan negatif tentang seorang kandidat, yang lengkap&mdash;karena bersumber dari publik luas, juga valid&mdash;karena diverifikasi oleh tiga mahasiswa yang dipilih acak.
				</p>
				',
			],
			[
				'Apa tujuannya?',
				'tujuan',
				'
				<ol>
				<li>
					<p>
						Membantu publik memilih pemimpin terbaik seobjektif mungkin, dengan menjadi museum digital yang mengumpulkan fakta-fakta penting dari para kandidat.
					</p>
				</li>
				<li>
					<p>
						Membuat calon-calon pejabat publik makin takut melakukan hal korup, karena sadar bahwa internet tidak akan pernah lupa.
					</p>
				</li>
				<li>
					<p>
						Membuat calon-calon pejabat publik makin bersemangat melakukan hal-hal baik, karena sadar bahwa internet tidak akan pernah lupa.
					</p>
				</li>
				<li>
					<p>Menyediakan informasi yang paling netral, karena sifatnya aggregat dan dijaga oleh kelas sosial paling idealis: mahasiswa.</p>
				</li>
				</ol>'
			],
			[
				'Kelebihannya dibanding solusi serupa?',
				'kelebihan',
				'
				<p>
					Dibanding media massa: Wikikandidat pasti tidak memihak. 
				</p>
				<p>
					Dibanding Wikipedia: Wikikandidat pasti ada bukti-bukti pendukung, diverifikasi oleh tiga mahasiswa secara acak, tidak bisa langsung diubah oleh siapapun.  
				</p>
				<p>
					Dibanding Linkedin atau website buatan tim sukses: Wikikandidat tidak bisa diubah semau yang bersangkutan. 
				</p>
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
				<p>
					Mahasiswa verifikator Wikikandidat di pilkada 2017, diseleksi secara khusus agar tidak punya sejarah afiliasi.
				</p>
				',
			],
			[
				'Siapa publik luas yang bisa menambahkan fakta?',
				'tambah-fakta',
				'
				<p>
					Semua orang yang terdaftar di wikikandidat.com. Semua orang yang sudah memiliki KTP bisa mendaftar.
				</p>
				<p>
					KTP diperlukan saat pendaftaran. Di masa depan, akan ada fitur Wikikandidat yang memerlukan identitas asli.
				</p>
				<p>
					Jika kamu belum bisa membuat KTP, kamu bisa membantu dengan mengajak kakak atau orang tua kamu. 
				</p>
				',
			],
			[
				'Siapa mahasiswa yang bisa memverifikasi fakta?',
				'mahasiswa',
				'
					<p>
						Mahasiswa aktif program sarjana atau diploma, yang berwarga negara Indonesia.
					</p>
					<p>
						Wikikandidat.com belum cukup matang pada saat ini. Jadi mohon maaf, verifikator masih harus berada dalam satu area.
					</p>
					<p>
						Tujuannya, agar kami bisa bertemu langsung untuk pelatihan penggunakan Wikikandidat.com sebagai verifikator.
					</p>
					<p>
						Mahasiswa yang tinggal di dekat Universitas Indonesia Depok bisa menghubungi rizky.syaiful@gmail.com untuk jadi verifikator. 
					</p>
				',
			],
			[
				'Seberapa kredibel yang fakta yang tertulis di Wikikandidat?',
				'disclaimer',
				'
				<p>
					Disclaimer: Wikikandidat tidak bisa menjamin kebenaran dan terlepas atas apa yang tertulis di atasnya. Wikikandidat hanyalah sebuah tempat berkumpulnya informasi-informasi di luar sana. </p>
				<p>
					Sama seperti Facebook yang tidak bisa dituntut atas apa yang penggunanya tulis, Wikikandidat juga tidak bisa dituntut oleh pasal pencemaran nama baik atau apapun. Verifikator Wikikandidat sendiri tidak bisa dituntut, karena dia 100% merujuk sumber kredibel di luar yang merilis informasi.</p>
				<p>
					Jika ada bukti dari media massa yang baru diketahui kalau tidak benar&mdash;yang bisa jadi mencemarkan nama baik, silahkan ajukan bukti baru yang membuktikan bahwa yang lama tidak benar lagi. Mahasiswa di Wikikandidat.com akan memverifikasinya sesuai prosedur.</p>',
			],
			[
				'Wikikandidat sejenis Wikileaks?',
				'wikileaks',
				'
				<p>
					Bukan.
				</p>
				<p>
					Verifikator Wikikandidat tidak perlu khawatir. Kita memang bersinggungan dengan politik. Tapi kita 100% aman.
				</p>
				<p>	
					Karena Wikikandidat tidak menerima bukti mentah lalu melakukan riset kebenaran bukti tersebut&mdash;sebagaimana yang dilakukan Wikileaks.
				</p>
				<p>
					Karena tidak seperti media massa, Wikikandidat tidak merilis informasi.
				</p>
				<p>
					Fokus kami adalah kurasi/pengumpulan/pencatatatan informasi yang sudah terverifikasi benar di publik. Sehingga publik bisa langsung mengenal seorang kandidat seobyektif mungkin.
				</p>
				<p>
					Namun, jika kamu memiliki fakta sensitif &amp; rahasia, yang bisa mengubah pandangan orang banyak tentang seseorang, kami menyarankan untuk mempublikasikan fakta tersebut.
				</p>
				<p>
					Kami akan mengajarkan cara mempublikasikan fakta tersebut dengan anonimus, sehingga ada pihak yang bisa memverifikasi kebenarannya. Dan akhirnya, bisa dicatat di Wikikandidat.
				</p>
				'
			],
			[
				'Kontak',
				'kontak',
				'
				<p>
					Untuk saat ini, kirimkan email ke : rizky.syaiful@gmail.com. Atau kontak via LINE di rizky_syaiful.
				</p>
				'
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