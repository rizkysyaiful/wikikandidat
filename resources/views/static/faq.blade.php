@extends('layouts.app')

@section('title')
F.A.Q
@endsection

@section('content')
<div class="container reading">
	<h2 class="anchor" id="utama">Pertanyaan Utama<br></h2>
	<?php
		$faq = [
			[
				'Kenapa?',
				'why',
				'
				<p>
					Ekosistem pemerintahan sekarang membuat kami muak.
				</p>
				<p>
					Tujuan umat manusia membuat pemerintahan, adalah untuk menyelesaikan masalah bersama, di konteks hubungan mereka.
				</p>
				<p>
					Mulai dari sepasang kekasih, lima orang anggota keluarga penghuni rumah, perusahaan yang baru didirikan, rukun tetangga, perusahaan multi-nasional, perkumpulan penggemar drama korea. Semua. Semua yang punya urusan bersama. 
				</p>
				<p>
					Sekelompok manusia menegakan aturan, kegiatan, proses, dan segala kesepakatan lain untuk menyelesaikan masalah mereka&mdash;demi mencapai tujuan bersama. Kita menyebut kelompok tersebut "organisasi".
				</p>
				<p>
					Sekarang pertanyaannya, "sudah seberapa efektif organisasi Negara Kesatuan Republik Indonesia menghasilkan kesepakatan yang paling diinginkan rakyatnya"?
				</p>
				<p>
					Jawaban kami, "masih jauh". <strong>Orang-orang kuat masih bisa mempengaruhi kesepakatan NKRI, demi kepentingan mereka sendiri. Oknum-oknum di pemerintah, pengusaha, media massa, masih bisa telanjang bersama di dalam selimut</strong>.
				</p>
				<p>
					Betul, kami setuju kondisi memuakan tersebut tidak disebabkan oleh satu hal. Itu adalah masalah kompleks. Benang kusut.
				</p>
				<p>
					Tapi kami percaya, ada bagian di benang kusut yang mudah kita urai. Bagian itu adalah pemilu.
				</p>
				<p>
					Kami percaya rakyat Indonesia harus memilih karena impian terdalam si kandidat. Karena impian kandidatlah yang akan berujung ke keputusan-keputusan&mdash;yang akan mempengaruhi hidup si rakyat. 
				</p>
				<p>
					Satu-satunya cara terakurat untuk melihat impian terdalam seseorang, adalah bukan dengan membaca janji kampanye, tapi dengan melihat semua yang sudah nyata dia lakukan di masa lalu. Semua. Positif. Maupun negatif.
				</p>
				<p>
					Terima kasih kepada teknologi internet, saat ini kita punya mekanisme untuk mengumpulkan dan menjaga informasi rekam jejak seseorang.
				</p>
				<p>
					Kalau kamu juga setuju ada yang salah di ekosistem pemerintahan sekarang, bergabunglah dengan kami. Kalau kamu percaya pemilu bisa dibuat lebih baik. Bantu Wikikandidat.com.
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
		<span class="pull-right"><a data-scroll href="#utama">balik ke atas</a></span>
		<h5 class="anchor" id="{{$q[1]}}"><strong>{{$q[0]}}</strong></h5>
		{!!$q[2]!!}
	@endforeach
	<hr>
	<h2 class="anchor" id="fakta-bukti">Mengajukan Fakta &amp; Bukti Baru ke Wikikandidat<br><small>
	Cara Semua Orang untuk Berkontribusi</small></h2>
	<?php
		$faq = [
			[
				'Bisa memasukan fakta apa saja?',
				'jenis-fakta',
				'
				<p>
					Saat ini. Fakta berikut bisa dimasukan ke Wikikandidat:
				</p>
				<ol>
					<li>				
						<p>Karir: segala kegiatan yang jadi mata pencaharian utama selepas lulus sekolah. Jika pernah penuh-waktu sebagai pejabat partai, tetap masuk bagian ini.</p>
					</li>
					<li>
						<p>Pendidikan: program edukasi baik dari lembaga formal maupun informal. SD &amp; SMP tidak kami masukan.</p> 
					</li>
					<li>
						<p>Kontribusi ke Organisasi: jabatan atau pemberian ke organisasi apapun di luar karirnya. Dari sini akan terlihat afiliasi-afiliasi seorang kandidat.</p>
					</li>
					<li>
						<p>Prestasi: penghargaan dari sebuah lembaga atau tindakan yang mayoritas orang menganggapnya baik.</p>
					</li>
					<li>
						<p>Kontroversi: tindakan yang mayoritas orang menganggapnya buruk, atau yang cukup terbagi pandangan baik atau buruknya.</p>
					</li>
				</ol>
				'
			],
			[
				'Aku tahu fakta yang belum ada di Wikikandidat, bagaimana cara menambahkannya?',
				'cara-tambah-fakta',
				'
				<p>
					Terima kasih atas niat baik kontribusinya. Kalau semua orang seperti kamu, dunia akan jadi lebih baik dari sekarang.
				</p>
				<p>
					Semua fakta kandidat yang tertulis di Wikikandidat memiliki bukti pendukung. 
				</p>
				<p>
					Langkah kamu selanjutnya, adalah memastikan fakta yang akan kamu tambahkan itu, memiliki bukti pendukung yang bisa diakses dari alamat internet. Kenapa? Karena perlu divalidasi dulu oleh tiga mahasiswa acak sebelum bisa tampil di halaman depan.
				</p>
				<p>
					Dan mahasiswa&mdash;yang tidak mungkin kamu ketahui identitasnya&mdash;hanya bisa memvalidasi kredibilitas sumber bukti kamu lewat internet.
				</p>
				'
			],
			[
				'Sumber bukti yang kredibel buat verifikator?',
				'definisi-valid',
				'
				<p>
					Berdasarkan urutan...
				</p>
				<ol>
					<li>
						<p>Bukti langsung: contoh rekaman video, percakapan, atau dokumen bocoran yang sudah diinvestigasi kebenarannya oleh jurnalis dan aktifis luas.</p>
					</li>
					<li>
						<p>Apa yang disampaikan oleh media massa profesional dan bereputasi. <a href="https://en.wikipedia.org/wiki/Wikipedia:Identifying_reliable_sources#News_organizations" target="_blank">Kami mengambil definisi yayasan Wikipedia tentang media massa yang professional dan bereputasi</a>.</p>
						<ul>
							<li>Kredibilitas media massa perilis berita adalah hal penting.</li>
							<li>Media massa daring (<em>online</em>) yang juga punya produk cetak lebih kredibel dari yang tidak.
							<li>Media massa daring yang tidak punya alamat dan tim redaksi yang bisa dikontak tidak bisa dijadikan sumber bukti.</li>
							<li>Media massa yang punya riwayat merevisi kesalahan jurnalistiknya memiliki level kredibilitas lebih tinggi dibanding yang tidak. Apalagi yang memiliki riwayat menghilangkan tautan ke beritanya.</li>
						</ul>
					</li>
				</ol>
				',
			],
			[
				'Kalau bukti fakta ternyata dinyatakan tidak valid lagi?',
				'bukti-tidak-valid',
				'
				<p>
					Berarti seperti putusan pengadilan yang direvisi? Ada perubahaan terkait fakta di masa lampau?
				</p>
				<p>
					Penjelasan fakta tersebut akan ditambahkan dengan perubahan tersebut. Bukti penunjang akan ditambahkan ke fakta tersebut&mdash;ingat, satu fakta bisa memiliki lebih dari satu bukti.
				</p>
				<p>
					Pergerakan sebuah isu akan terekam di Wikikandidat. Itu lebih baik dan informatif daripada isunya dihilangkan sama sekali. 
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
		<span class="pull-right"><a data-scroll href="#fakta-bukti">balik ke atas</a></span>
		<h5 class="anchor" id="{{$q[1]}}"><strong>{{$q[0]}}</strong></h5>
		{!!$q[2]!!}
	@endforeach
	<hr>
</div>
@endsection

@section('js')
	<script src="{{asset('js/smooth-scroll.js')}}"></script>
	<script>
		smoothScroll.init();
	</script>
@endsection