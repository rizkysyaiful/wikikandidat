@extends('layouts.app')

@section('title')
Tentang
@endsection

@section('content')
<div class="container reading">
	<h2 class="anchor" id="atas">Tentang Kami<br></h2>
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
					<p>
						<strong>Kami percaya rakyat Indonesia harus memilih berdasarkan impian terdalam ("why") si kandidat. Karena impian terdalamlah yang jadi dasar aksi-aksi seorang manusia.</strong> 
					</p>
					</blockquote>
				<p>
					Masalahnya: media massa masih jadi saluran informasi utama para kandidat ke pemilih. Apa yang salah dengan media massa? 
				</p>
				<ol>
					<li>Mereka memihak</li>
					<li>Mereka hanya menampilkan berita terbaru (tidak mengangkat riwayat hidup)</li>
				</ol>
				<blockquote>
				<p>
					Impian terdalam seseorang, hanya bisa diverifikasi lewat semua yang sudah nyata dia lakukan di masa lalu. Semua. Positif. Maupun negatif.
				</p>
				</blockquote>
				<p>
					<u>Bukan lewat janji kampanye. Bukan lewat aksi kampanye.</u>
				</p>
				<p>
					Terima kasih kepada teknologi internet, saat ini kita punya mekanisme untuk mengumpulkan dan menjaga informasi rekam jejak seseorang.
				</p>
				<p>
					Kalau kamu juga setuju ada yang salah di ekosistem pemilihan sekarang, bergabunglah dengan kami. Bantu Wikikandidat.com.
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
					Jauh sebelum memulai Wikikandidat di 2014, Rizky tidak pernah terafiliasi dengan pihak politik manapun. Alasan memulai Wikikandidat sendiri, hanya karena ingin memperbaiki sebuah inovasi KPU di Pileg 2014: Curriculum Vitae caleg yang berbentuk scan PDF kertas tulis tangan. Rizky Syaiful netral dan tidak pernah mempublikasikan pilihan pribadinya di pemilu.
				</p>
				<p>
					Mayoritas relawan mahasiswa Wikikandidat saat pileg 2014, berasal dari Kelompok Studi Mahasiswa Eka Prasetya UI. Kelompok studi tersebut termasuk netral rekam jejak politiknya.
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
					Disclaimer: Wikikandidat tidak bisa menjamin kebenaran dan terlepas atas apa yang tertulis di atasnya. Wikikandidat.com adalah sebuah tempat. Semua yang berdiri di atasnya bertanggung jawab atas segala aksi masing-masing.</p>
				<p>
					Sama seperti Facebook yang tidak bisa dituntut atas apa yang penggunanya tulis, Wikikandidat juga tidak bisa dituntut oleh pasal pencemaran nama baik atau apapun.</p>
				<p>
					Jika ada bukti dari media massa yang ternyata tidak benar&mdash;yang bisa jadi mencemarkan nama baik, silahkan ajukan bukti baru yang membuktikan bahwa yang lama tidak benar lagi. Mahasiswa di Wikikandidat.com akan memverifikasinya sesuai prosedur.</p>',
			],
			[
				'Wikikandidat sejenis Wikileaks?',
				'wikileaks',
				'
				<p>
					Bukan. Kami tidak menerima bukti mentah &amp; melakukan proses verifikasi kebenaran seperti Wikileaks.
				</p>
				<p>
					Fokus kami adalah kurasi/pengumpulan/pencatatatan apa yang sudah terverifikasi benar di publik. Sehingga publik bisa langsung mengenal seorang kandidat seobyektif mungkin.
				</p>
				<p>
					Namun, jika kamu memiliki fakta sensitif &amp; rahasia, yang bisa mengubah pandangan orang banyak tentang seseorang, kami menyarankan untuk mempublikasikan fakta tersebut.
				</p>
				<p>
					Kami akan mengajarkan cara mempublikasikan fakta tersebut dengan anonimus, sehingga ada pihak yang bisa memverifikasi kebenarannya. Dan akhirnya, bisa dicatat di Wikikandidat.
				</p>
				'
			],
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
	<script src="{{asset('js/smooth-scroll.js')}}"></script>
	<script>
		smoothScroll.init();
	</script>
@endsection