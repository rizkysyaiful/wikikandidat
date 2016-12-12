@extends('layouts.app')

@section('title')
Kontribusi
@endsection

@section('content')
<div class="container reading">
	<h1 class="anchor" id="kontribusi">Mengajukan Fakta &amp; Bukti Baru ke Wikikandidat<br><small>
	Cara Semua Orang untuk Berkontribusi</small></h1>
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
					<li>
						<p>
							Apa yang diklaim sendiri oleh kandidat yang bersangkuan&mdash;atau tim suksesnya.
						</p>
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
		<span class="pull-right"><a data-scroll href="#kontribusi">balik ke atas</a></span>
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