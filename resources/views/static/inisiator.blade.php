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
	<div class="text-center text-muted"><em>Mau organisasi kamu terkenal di mata semua pengunjung halaman sebuah daerah pemilihan (dapil)?<br>Bisa. Karena Wikikandidat berpeluang punya banyak pengunjung.<br>1) Kami punya FB Comment &amp; tombol +1 Google&mdash;kami mudah viral.<br>2) Impian kami besar dan jauh melampaui pilkada 2017&mdash;kami visioner.<br>3) Di Pileg 2014 pengunjung kami sebanyak 1/3 penonton Gelora Bung Karno (25.928 orang)&mdash;kami bukan sekedar pemimpi.</em></div>
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
							Adanya rekam jejak para kandidat versi pertama&mdash;tidak mesti lengkap&mdash;akan sangat membantu. Wikikandidat butuh dipicu.
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
							Pilkada 2017 kebetulan diadakan di banyak dapil. Tentu banyak tersebar organisasi mahasiswa daerah&mdash;yang secara hati dan fisik lebih dekat dengan warga di sebuah dapil.
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
				'manfaat-buat-organisasi-kamu',
				'<p>
					Pertama-tama, yang paling utama, dan yang tiada banding, tentu saja: 
				</p>
				<blockquote>
					<p>
						perasaan bahagia karena telah membantu orang lain.
					</p>
				</blockquote>
				<p class="text-center">
					<img class="img-thumbnail" src="'.asset('img/manfaat-wikikandidat-2014.png', $secure).'" alt="">
				</p>
				<p>
					Bayangkan kerja keras anda mendapatkan respon seperti di atas.
				</p>
				<p class="text-center">
					<img width="300px" class="img-thumbnail" src="'.asset('img/happy.gif', $secure).'" alt="">
					<br>
					Senang?
				</p>
				<p class="text-center">
					<img width="300px" class="img-thumbnail" src="'.asset('img/proud.gif', $secure).'" alt="">
					<br>
					Bangga?
				</p>
				<p>
					Persis. Itu yang nyata kami rasakan tahun 2014 lalu. Respon-respon lain dari pengguna Wikikandidat bisa dilihat di <a href="https://disqus.com/home/forum/wikikandidat/" target="_blank">sini</a>.
				</p>
				<p>
					Sudah? Itu saja?
				</p>
				<p>
					Tentu tidak.
				</p>
				<blockquote>
					<p>
						2. Memberi lebih ke follower-follower kamu
					</p>
				</blockquote>
				<p>
					Terlepas dari Wikikandidat, ada kemungkinan organsisasi kamu memang ingin menyemarakkan momentum Pilkada 2017.
				</p>
				<p>
					Karena umumnya organisasi mahasiswa punya idealisme berikut, "pemilu adalah hal penting untuk kemaslahatan bersama". Yang artinya, sebisa mungkin tidak ada yang golput dan asal pilih.
				</p>
				<p>
					Bahkan mungkin, kamu juga meriset rekam jejak kandidat. Lalu berencana mempublikasikannya dalam bentuk infografis mini di Instagram, Facebook, atau Twitter.
				</p>
				<p>
					Dengan adanya Wikikandidat, kamu sebenarnya melakukan hal yang sama, namun dengan hasil yang jauh lebih besar.
				</p>
				<blockquote>
					<p>
						Kenapa? Karena lebih dari infografis yang statis, Wikikandidat adalah tempat berinteraksi dengan teman-teman Facebook kita masing-masing, tentang semua kandidat di sebuah dapil.
					</p>
				</blockquote>
				<p class="text-center">
					<img class="img-thumbnail" src="'.asset('img/wikikandidat-interaktif.png', $secure).'" alt="">
				</p>
				<p>
					Pengunjung akan segera menyadari kalau, dia bisa melihat komentar temannya di masa lampau. Yang artinya, dia sadar, komentar dia sendiri akan dilihat teman-temannya di masa depan. 
				</p>
				<blockquote>
					<p>
						Semua di satu tempat yang sama&mdash;dan abadi, bukan status FB yang akhirnya tenggelam oleh waktu.
					</p>
				</blockquote>
				<p>
					Karena mereka tahu Wikikandidat dari kamu&mdash;dan tahu kalau data inisial itu diriset oleh kamu&mdash;mereka akan memandang kamu lebih keren.
				</p>
				<blockquote>
					<p>
						3. Meluaskan pandangan positif terhadap organisasi kamu
					</p>
				</blockquote>
				<p>
					Di poin sebelumnya, kamu sudah tahu kalau halaman Wikikandidat bersifat interaktif. Tentu karena Wikikandidat terintegrasi dengan Facebook Comment.
				</p>
				<p>
					Kalau sudah pernah coba Facebook Comment, kamu akan tahu kalau komentar pengguna, kemungkinan besar akan muncul di timeline Facebook teman-teman mereka. Artinya, boom! Jangkauan kontribusi kamu akan meluas. Makin menarik diskusi yang juga muncul di FB, makin viral halaman Wikikandidat.
				</p>
				<p>
					Itu belum menghitung pengunjung yang datang dari Google. Tahun 2014, mayoritas 25.928 pengunjung Wikikandidat datang dari pencarian Google. Lebih-lebih, tahun 2016 ini Wikikandidat menggunakan tombol +1 Google untuk \'mensimulasikan voting\' ke kandidat. Ranking Wikikandidat di Google makin terdongkrak oleh fitur ini. 
				</p>
				<p>
					Bayangkan jumlah dan beragamnya pengunjung halaman sebuah dapil. Bayangkan setiap dari mereka, melihat logo organisasi mahasiswa kamu di atas.
				</p>
				<p class="text-center">
					<img src="'.asset('img/contoh-initiator.jpeg', $secure).'" alt="">
					<br>
					<em>Logo kamu ada, karena kamu melahirkan versi pertama dari data-data kandidat. Organisasi kamu memungkinkan orang untuk membaca dan melengkapi data kandidat.</em>
				</p>
				<blockquote>
					<p>
						Popularitas kamu meningkat. Alumnus-alumnus organisasi kamu yang sudah berkarir akan bangga.
					</p>
				</blockquote>
				<p>
					Populer bukan hal yang buruk atau dangkal. Dengan jadi lebih populer, jangkauan kamu jadi lebih luas. Beberapa orang, tidak lagi memandang sebelah mata.
				</p>
				<p>
					Rencana-rencana besar kamu di depan akan lebih didukung. Sponsor jadi lebih banyak. Senior jadi lebih mudah dimintai donasi&mdash;apalagi kalau ternyata mereka juga pengguna Wikikandidat.
				</p>
				<p>
					Tujuan organisasi kamu jadi lebih mudah tercapai.
				</p>
				<p>
					<em>NB: Jika data dapil yang kamu incar sudah dilengkapi oleh organisasi lain, kamu bisa tetap ikut populer dengan mengadakan penyuluhan penggunaan Wikikandidat. Acara penyuluhan kamu akan diberitakan juga di halaman dapil incaran kamu.</em> 
				</p>
				'
			],
			[
				'Apa langkah-langkah yang organisasi mahasiswa perlu lakukan?',
				'usaha',
				'
				<p>
					Tertarik? Melengkapi data semua kandidat di sebuah dapil?
				</p>
				<p>
					Jika iya, segera hubungi contact person Wikikandidat di dapil tersebut.
				</p>
				<blockquote>
					<p>
						Karena mekanismenya adalah siapa-cepat-dia-dapat.
					</p>
				</blockquote>
				<p>
					Langkah-langkah yang organisasi kamu perlu lakukan adalah:
				</p>
				<ol>
					<li>
						Membuat tim dengan minimal lima mahasiswa sarjana/diploma aktif&mdash;yang tidak pernah bergabung dengan organisasi sayap partai.<br><br>
					</li>
					<li>
						Tim tersebut lalu men-<em>download</em> berkas .docx. Berkas digital tersebut akan jadi tempat draf rekam jejak seorang kandidat. Petunjuk pengisian juga akan ada di berkas tersebut. Kalau organisasi kamu kebetulan sudah punya data rekam jejak (dengan sumber-sumbernya tentu saja), tim tinggal menuliskannya ulang di format Wikikandidat. Kalau belum punya...<br><br>
					</li>
					<li>
						...Tim lalu berusaha melengkapi rekam jejak semua kandidat. Beberapa KPUD merilis rekam jejak. Jika tidak, tim perlu menghubungi tim sukses tiap kandidat. Riset dari media massa juga dimungkinkan. Standar sumber kredibel menurut Wikikandidat akan jelas tersedia.<br><br>
					</li>
					<li>
						Di titik ini, rekam jejak kandidat sudah lengkap dan tertulis di format Wikikandidat. Namun masih di berkas docx, belum di wikikandidat.com. Selanjutnya, Seluruh anggota tim melakukan pemasukan sekaligus verifikasi di wikikandidat.com. Proses ini cepat, tidak lebih dari satu hari, karena memang data sudah  diedit oleh Contact Person dapil tim.<br><br>
					</li>
					<li>
						Hore! Sebuah halaman dapil resmi bisa digunakan. Contact person dapil akan segera menampilkan logo organisasi kamu. Sebarkan seluas mungkin.<br><br>
					</li>
				</ol>
				<p>
					Sepanjang langkah-langkah tersebut, organisasi kamu akan selalu dipandu oleh contact person dari dapil.
				</p>
				<p>
					Jadi tunggu apa lagi, segera hubungi contact person. Ada di bagian atas tiap halaman dapil Wikikandidat.
				</p>
				'
			],
			[
				'Apa saja resiko untuk organisasi mahasiswa?',
				'resiko',
				'
				<p>
					Oke. Biaya (cost) dan hasil (benefit) sudah dijelaskan. Bagaimana dengan resiko (risk)?
				</p>
				<p>
					<em>Selain fakta bahwa filosofi Wikikandidat itu adalah transparansi, transparan terhadap resiko adalah sesuatu yang bagus. Semua entrepreneur adalah pengambil  resiko, tapi entrepreneur yang bagus adalah yang tahu "meski hal terburuk terjadi, mereka tidak akan rugi".</em>
				</p>
				<p>
					Apa kemungkinan terburuk dari membantu Wikikandidat?
				</p>
				<blockquote>
					<p>
						Yang pasti bukan terkena gugatan pencemaran nama baik&mdash;atau gugatan lain.
					</p>
				</blockquote>
				<p>
					Ya, pemilihan umum memang sesuatu yang sensitif. Pertaruhan dana kampanye bermiliar-miliar. Semua demi mendapatkan kekuasaan.
				</p>
				<p>
					Tapi tetap saja, Wikikandidat tidak bisa digugat. Karena Wikikandidat hanya mengumpulkan dan merangkum informasi-informasi yang sudah dirilis ke publik.
				</p>
				<p>
					Kalau ada masalah, perilis informasi-lah yang digugat&mdash;bukan organisasi mahasiswa kamu. Selain itu, informasi di Wikikandidat bisa segera diperbarui jika ternyata sumbernya tidak relevan lagi.
				</p>
				<p>
					Dalam proses riset di awal, seluruh organisasi mahasiswa akan menggunakan definisi sumber kredibel yang sama.
				</p>
				<p>
					Jadi, dari sisi politik atau hukum, membantu Wikikandidat 100% aman.
				</p>
				<blockquote>
					<p>
						Resiko terburuk adalah jumlah pengunjung Wikikandidat yang ternyata tidak sebanyak yang diharapkan.
					</p>
				</blockquote>
				<p>
					Jika dilihat di bagian benefit, banyak klaim berlandaskan asumsi: "Wikikandidat laris manis & viral".
				</p>
				<p>
					Apa benar Wikikandidat akan laris manis?
				</p>
				<p>
					Meski dengan segala visi luhurnya, 25.928 penggunanya di tahun 2014,  fitur-fitur inovatifnya saat ini, anggaplah Wikikandidat di pilkada 2017 ini sepi pengunjung.
				</p>
				<p>
					Anggaplah usaha dua hari penuh, lima orang di organisasi kamu, dalam melengkapi dan memasukan data inisial kandidat di sebuah dapil, hanya membawa 100 pengunjung & hanya 10 yang memberi komentar tentang kandidat.
				</p>
				<blockquote>
					<p>
						Di skenario terburuk itu, kerugian konkrit kamu <u>hanyalah</u> peluang peningkatan dukungan (dana) dari almamater organisasi.
					</p>
				</blockquote>
				<p>
					Hanya itu.
				</p>
				<p>
					Asumsi: almamater organisasi kamu hanya bangga jika tahu logo organisasinya dulu dilihat minimal seribu orang, maka tidak akan ada dukungan lebih dari mereka.  
				</p>
				<p>
					Kenapa?
				</p>
				<p>
					Karena kamu tetap membuat orang lain bahagia&mdash;meski orangnya tidak banyak. Kamu tetap melayani <em>base follower</em> kamu.
				</p>
				<p>
					Seburuk-buruknya, dua hari milik lima orang anggota kamu telah merubah  infografis statik seperti ini...
				</p>
				<p class="text-center">
					<img  width="75%" src="'.asset('img/infografis-statis-1.jpg', $secure).'" alt="">
				</p>
				<p class="text-center">
					<img  width="75%" src="'.asset('img/infografis-statis-2.jpg', $secure).'" alt="">
				</p>
				<p>
					...menjadi tempat interaktif seperti ini...
				</p>
				<p class="text-center">
					<img class="img-thumbnail" src="'.asset('img/wikikandidat-interaktif.png', $secure).'" alt="">
				</p>
				<p>
					Hanya dengan sehari memindahkan data yang kamu riset ke Wikikandidat, kamu telah melayani massa kamu dengan edukasi pilkada interaktif, personal, dan pastinya, lebih menyenangkan. 
				</p>
				<p>
					Jelas itu bukanlah suatu kerugian.  
				</p>
				<p>
					Karena di skenario terburuk-pun kamu tidak merugi, melengkapi data inisial sebuah dapil adalah langkah mereka yang berjiwa entrepreneur sukses.
				</p>
				<p>
					<a data-scroll href="#usaha">Segera bantu lengkapi</a>.
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
	<hr>
</div>
@endsection

@section('js')
	<script src="{{asset('js/smooth-scroll.js', $secure)}}"></script>
	<script>
		smoothScroll.init();
	</script>
@endsection