<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
Inisiator
@endsection

@section('content')
<div class="container reading">
	<img class="center-block" src="{{asset('img/contoh-initiator.jpeg', $secure)}}">
	<div class="text-center text-muted"><em>Mau organisasi kamu terkenal di mata semua pengunjung halaman sebuah dapil?<br>Bisa. Karena Wikikandidat berpeluang punya banyak pengunjung.<br>1) Kami punya FB Comment &amp; tombol +1 Google&mdash;kami mudah viral.<br>2) Impian kami besar dan jauh melampaui pilkada 2017&mdash;kami visioner.<br>3) Di Pileg 2014 pengunjung kami sebanyak 1/3 penonton Gelora Bung Karno (25.928 orang)&mdash;kami bukan sekedar pemimpi.</em></div>
	<h1 class="anchor" id="atas">Inisiator<br><small>
	Organisasi kamu sebagai inisiator sebuah dapil</small></h1>
	<?php
		$faq = [
			[
				'Kenapa Wikikandidat butuh kamu?',
				'kenapa',
				'
				<ol>
					<li>
						<p>
							<u>Dilema ayam-telur</u>.
						</p>
						<p>
							Sama seperti Wikipedia. Agar orang tertarik melengkapi rekam jejak, dia harus lebih dulu yakin Wikikandidat memang bisa digunakan.
						</p>
						<p>
							Artinya, langsung mengajak publik luas, untuk mengumpulkan rekam jejak dari 0 besar, adalah hal yang sulit.
						</p>
						<p>
							Adanya rekam jejak para kandidat versi pertama&mdash;tidak mesti lengkap&mdash;akan sangat membantu. 
						</p>
					</li>
					<li>
						<p>
							<u>Sendiri vs Gotong Royong</u>.
						</p>
						<p>
							Juga sama seperti Wikipedia. Versi ideal Wikikandidat adalah komunitas.
						</p>
						<p>
							Untuk memecahkan dilema ayam-telur, kami bisa saja melakukan riset mandiri. Kami tinggal menelpon tim sukses tiap kandidat, meminta data rekam jejak, lalu memasukan sendiri ke Wikikandidat.
						</p> 
						<p>
							Tapi di skenario tersebut, kami gagal menciptakan Wikikandidat sebagai komunitas. Kami hanya sendirian di perahu.
						</p>
						<p>
							Akan lebih baik kalau ada juga organisasi-organisasi mahasiswa lain di perahu. Di perahu itu, kita semua sadar, kalau Wikikandidat berkualitas &amp; populer, kita semua sama-sama dapat hasil.
						</p>
						<p>
							Apalagi manfaat Wikikandidat baru konkrit kalau calon pemilih sudah menggunakan. Komplitnya rekam jejak bukan tujuan akhir kami. Kami juga butuh dipasarkan ke publik luas.
						</p>
						<p>
							Apalagi Pilkada 2017 kebetulan diadakan di banyak daerah. Tentu banyak tersebar organisasi daerah yang secara fisik lebih dekat dengan warga&mdash;dan pastinya peduli dengan daerah masing-masing.
						</p>
					</li>
				</ol>
				<blockquote>
					<p>
						Singkatnya, Wikikandidat butuh kamu (organisasi mahasiswa) untuk melakukan riset rekam jejak seluruh kandidat di sebuah dapil.  
					</p>
				</blockquote>
				<p>
					Itu karena Wikikandidat &amp; organisasi mahasiswa daerah punya dua bahan wajib hubungan yang kuat:
				</p>
				<ol>
					<li>
						Irisan kepentingan, yaitu kesuksesan pilkada 2017.
					</li>
					<li>
						Keunggulan yang saling melengkapi, yaitu website yang handal (Wikikandidat) dan akses ke dapil (organisasi mahasiswa).
					</li>
				</ol>
				'
			],
			[
				'Apa yang organisasi mahasiswa dapatkan?',
				'hasil',
				''
			],
			[
				'Apa langkah-langkah yang organisasi mahasiswa perlu lakukan?',
				'usaha',
				''
			],
			[
				'Apa saja resiko untuk organisasi mahasiswa?',
				'resiko',
				''
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
	<hr>
</div>
@endsection

@section('js')
	<script src="{{asset('js/smooth-scroll.js', $secure)}}"></script>
	<script>
		smoothScroll.init();
	</script>
@endsection