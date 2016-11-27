<html>
<head>
</head>
<body>
	@if(	$submission->first_verifier_id != null && 
			$submission->second_verifier_id != null && 
			$submission->third_verifier_id != null)
		<p>
			Saran kamu sudah tersimpan. Email pemberitahuan ke mahasiswa acak sudah terkirim, mari kita berdoa beliau segera meninjau saran kamu.
		</p>
	@else
		@if($is_edited)
		<p>	
			@if($submission->first_verifier_id == null && 
				$submission->second_verifier_id == null && 
				$submission->third_verifier_id == null)
				Selamat! Saran kamu sudah tampil di wikikandidat.com. Silahkan lihat di halaman kandidat yang bersangkutan.
			@else
				Saran kamu sudah diproses oleh salah satu mahasiswa. Belum sampai tiga mahasiswa yang memproses saran kamu.
			@endif
		</p>
		<p>
			Saran kamu:<br>
			<em>{{$submission->text}}</em>
		</p>
		@else
		<p>
			Saran kamu ditolak oleh salah satu mahasiswa.
		</p>
		<p>
			Alasan penolakan:<br>
			<em>{{$submission->rejection_reason}}</em> 
		</p>
		@endif
	@endif
	<br><br>
	Email ini dikirim karena kamu terdaftar sebagai pengguna Wikikandidat. Halaman kamu: http://wikikandidat.com/user/{{$submission->submitter->username}}
</body>
</html>