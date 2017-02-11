<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@section('title')
Karakter Seorang {{$c->name}} 
@endsection

@section('head')

<style type="text/css">
    h1{
        line-height: 124%;
    }
    h3{
    	margin-top: 17px;
    	margin-bottom: 10px;
    }
    hr{
    	margin-top: 15px;
    	margin-bottom: 30px;
    }
</style>
<meta property="og:type" content="article" />
<meta property="og:description" content="Klik untuk baca testimoni-testimoni lain tentang {{$c->nickname}}. Penting kan ya, untuk tahu karakter/kepribadian orang yang akan bekerja melayani kita? Kamu juga bisa ikut menulis lho..." />
<meta property="og:image" content="{{$c->photo_url}}"/>
@endsection

@section('content')
<section class="page-personal">
    <div class="container">
      <div class="box-sidebar">
        <div class="couple-avatar-paslon-main" style="text-align: center;">
            <div class="avatar">
              <img src="{{$c->photo_url}}" alt="" class="img-cover">
            </div>
        </div>
        @if($c->name)
        <h3>Nama Lengkap</h3>
        <div>
            {{$c->name}}
        </div>
        @endif
        @if($c->birthdate)
        <h3>Lahir</h3>
        <div>
            {{$c->birthcity}}, {{$c->birthdate}}
        </div>
        @endif
        @if($c->pendidikan)
        <h3>Pendidikan</h3>
        <div>
            {!!$c->pendidikan!!}
        </div>
        @endif
        @if($c->karir)
        <h3>Karir</h3>
        <div>
            {!!$c->karir!!}
        </div>
        @endif
        @if($c->penghargaan)
        <h3>Penghargaan</h3>
        <div>
            {!!$c->penghargaan!!}
        </div>
        @endif
        @if($c->sumber_pemerintah)
        <h3>Sumber Data di Atas (dari lembaga pemerintah)</h3>
        <div>
            {!!$c->sumber_pemerintah!!}
        </div>
        @endif
        @if($c->sumber_non_pemerintah)
        <h3>Sumber Data di Atas (bukan dari lembaga pemerintah, verifikasi sendiri kebenarannya)</h3>
        <div>
            {!!$c->sumber_non_pemerintah!!}
        </div>
        @endif
      </div>
      <div class="box-content">
        @php
            $e = App\Election::find($c->election_id);
            $couple = $e->couples->sortBy('order');
        @endphp
        <a href="{{url($e->urlname, [], $secure)}}" class="btn btn-primary-o">
            &#8678; Kembali Lihat Seluruh Pasangan di {{$e->place->name}}
        </a><br><br>
        <div class="isi" style="width:100%;">
            <h1>Ceritakan Kepribadian {{$c->nickname}}, ke Kita yang Belum Pernah Berinteraksi dengan Beliau...</h1>
            <div class="fb-like" data-href="https://wikikandidat.com/{{$c->urlname}}" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

            <div style="color:grey;margin-top: 17px;">Tuliskan kenangan menarik dengan beliau. Tulis hanya jika kamu pernah berinteraksi langsung. Setiap pemilik akun bertanggung jawab atas apa yang ditulisnya.</div>
            <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="600" data-numposts="10" data-order-by="social"></div>
        </div>
        <hr>
        @foreach($couple as $co)
            @if($co->candidate->id != $c->id )
			<a href="{{url($co->candidate->urlname, [], $secure)}}" class="btn btn-primary-o">
		      Kepribadian {{$co->candidate->name}}<br>Menurut Orang-Orang yang Pernah Berinteraksi dengan Beliau (<span class="fb-comments-count" data-href="https://wikikandidat.com/{{$co->candidate->urlname}}"></span> Testimoni)
		    </a><br>
            @endif
            @if($co->running_mate->id != $c->id )
            <a href="{{url($co->running_mate->urlname, [], $secure)}}" class="btn btn-primary-o">
              Kepribadian {{$co->running_mate->name}}<br>Menurut Orang-Orang yang Pernah Berinteraksi dengan Beliau (<span class="fb-comments-count" data-href="https://wikikandidat.com/{{$co->running_mate->urlname}}"></span> Testimoni)
            </a><br>
            @endif
        @endforeach
      </div>
    </div>
  </section>
@endsection

@section('javascript')
	<script type="text/javascript">
        
	</script>
@endsection