<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
{{$election->name}} | Pendapat Teman Kamu
@endsection

@section('head')
<style type="text/css">
  /* bootstrap manipulation */
  .panel-body {
    background-color: rgba(240,240,240,1);
  }
  .panel{
    border: none;
  }
  .panel ol,ul{
    padding-left: 17px;
  }
  /* self-made */
  .panel-body > .head{
    text-align: center
  }
  .panel-body > .head > img{
    width: 100%;
  }
  .panel-body > .data{
    border-bottom: 1px solid #cacaca;
    padding: 2px 5px;
    margin-bottom: 5px; 
  }
  .data.first{
    border-top: 1px solid #cacaca;
  }
  .panel-body .corner-btn{
    margin-top: 3px;
    padding-left: 0.5em;
    padding-right: 0.5em;
    margin-left: 5px; 
    cursor: pointer;
  }
  .panel-body .corner-date{
    margin-left:-7px;
  }
  .panel-body > h5{
    color: #008cba;
    font-weight: bold;
    margin-top: 0;
  }
  .panel-body > .pull-right.glyphicon-plus{
    font-size: 12px;
    cursor: pointer;
  }
  .random-quote{
    max-width: 600px;
    margin-top: 25px;
    text-align: right;
    font-size: 14px;
  }
  .well > img{
    width: 100%;
  }
  .media-body > .well > ol,ul,p{
    margin-bottom: 0px;
  }
  .media-body > .well > ol,ul{
    padding-left: 17px;
  }
</style>

@endsection

@section('content')
    <div class="container">
      <p class="pull-right random-quote"><strong>Makin cerdas pemilih, makin keren pemimpinnya!</strong><br>Wikikandidat adalah museum rekam jejak kandidat.<br>Semua bisa menambah/mengubah rekam jejak,<br>tapi hanya informasi yang valid menurut tiga mahasiswa acak yang tampil.<br>
      <span class="text-muted">Bantu Wikikandidat.com sebagai:</span> <a href="{{url('tentang-kami#mahasiswa', [], $secure)}}">verifikator</a> &middot; <a href="{{url('cara-kontribusi', [], $secure)}}">penambah data</a> &middot; <a href="#">pemasar</a> &middot; <a href="https://github.com/rizkysyaiful/wikikandidat" target="_blank">developer</a><br>
       <a href="{{url('/tentang-kami#kontak', [], $secure)}}">Kontak</a> &middot; <a href="https://github.com/rizkysyaiful/wikikandidat/milestones?direction=asc&sort=due_date&state=open" target="_blank">Roadmap</a> <span class="text-muted">(ya, visi kami jauh melampaui pilkada 2017)</span>
      </p>
      <h1>{{$election->name}}</h1>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Provinsi</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('pilkada-2017-aceh', [], $secure)}}" href="pilkada-2017-aceh">Aceh</a></li>
          <li><a href="{{url('pilkada-2017-babel', [], $secure)}}" href="">Bangka Belitung</a></li>
          <li><a href="{{url('/', [], $secure)}}" href="pilkada-2017-jakarta">DKI Jakarta</a></li>
          <li><a href="{{url('pilkada-2017-banten', [], $secure)}}" href="pilkada-2017-banten">Banten</a></li>
        </ul>
      </div>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Kota/Kab</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
        </ul>
      </div>
      <hr>

      <!-- <div class="well well-sm" style="background-color: #faebcc;">
        <div style="text-align: center; margin-bottom: 10px;">
          <i class="em em-loudspeaker"></i> <strong>Pengumuman! Buat kamu yang peduli dengan {{$election->place->name}}</strong> <i class="em em-speaker"></i><br>
          <span class="text-muted">Bantu warga {{$election->place->name}} memilih pemimpin dengan lebih cerdas &amp; munculkan nama organisasi kamu di sini.</span>
        </div>
        <div class="row">
          <div class="col-md-5">
            @if($election->initiator == NULL)
              <u>1. Tolong bantu kumpulkan data inisial kandidat</u><br>
              Punya organisasi mahasiswa? Tertarik mengumpulkan data versi pertama seluruh kandidat {{$election->place->name}}? Selain konkrit membantu {{$election->place->name}}, nama, logo &amp; link ke organisasi kamu akan muncul di banner ini, di halaman ini, selama-lamanya. Karena kontribusi organisasi kamu, halaman ini jadi bisa mulai bermanfaat untuk orang lain. <a href="{{asset('img/contoh-initiator.jpeg', $secure)}}" target="_blank">Ingin seperti contoh ini? Segera hubungi, jangan sampai keduluan organisasi lain</a>.
            @else
              Terima kasih kepada teman-teman di<br>
              {!!$election->initiator!!}<br>
              atas bantuannya dalam meriset versi pertama rekam jejak kandidat {{$election->place->name}}. Karena kalian, halaman ini jadi bisa dibaca &amp; mulai dilengkapi orang banyak.
            @endif
          </div>
          <div class="col-md-7" style="padding-left: 0px;">
            @if($election->promoters == NULL)
              <u>2. Tolong bantu sebarkan keberadaan Wikikandidat ke pemilih</u><br>
              Setelah data versi pertama terkumpul, Wikikandidat sudah bisa digunakan. Sayang, belum banyak orang di {{$election->place->name}} yang tahu. Yuk, bantu dengan menulis artikel tentang halaman ini. Atau bisa juga dengan mengadakan penyuluhan langsung. Dokumentasikan segala kegiatan kamu secara online. Lalu beritahu kami. Semua link ke bantuan kamu akan tercatat di sini. Selama-lamanya (FYI, selain membuat organisasi kamu lebih populer, akan mendongkrak ranking website kamu di Google juga).
            @else
              Teman-teman yang sudah beraksi demi pilkada yang lebih cerdas {{$election->place->name}}:<br>
              {!!$election->promoters!!}
            @endif
          </div>
        </div>
        <?php 
          $cp = App\User::find($election->cp);
        ?>
        <div style="text-align: center; padding-top: 10px;">
          <strong>
            Ingin bantu warga {{$election->place->name}}? Ingin nama organisasi kamu tercantum di atas? Hubungi {{$cp->name}} di {{$cp->email}}
          </strong>
        </div>
      </div>
      -->
      <div class="row">
        <?php
          $types =  App\Type::all();
        ?>
        @foreach($election->couples->sortBy('order') as $co)
          <?php 
            $c = App\Candidate::find($co->candidate_id);
            $rm = App\Candidate::find($co->running_mate_id);
          ?>
        <div class="col-md-4">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#primary-tab-{{$co->id}}" class="btn-md" data-toggle="tab" aria-expanded="true">{{$c->nickname}}</a></li>
            <li class=""><a href="#vice-tab-{{$co->id}}" class="btn-md" data-toggle="tab" aria-expanded="false">{{$rm->nickname}}</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="primary-tab-{{$co->id}}">
            
              <div class="panel panel-default" >
                <div class="panel-body">
                  <div class="head">
                    <img src="{{$c->photo_url}}" alt="">
                    <h3><a href="{{url($c->urlname, [], $secure)}}"><strong>{{$c->name}}</strong></a></h3>
                    <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{{$c->urlname}}" data-annotation="inline"></div>
                  </div>
                </div>
              </div>

              <h5><strong>Setelah membaca rekam jejak di bawah, seperti apa pandangan kamu tentang {{$c->nickname}}?</strong></h5>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="2"></div>

            </div>

            <div class="tab-pane fade" id="vice-tab-{{$co->id}}">

              <div class="panel panel-default" >
                <div class="panel-body">
                  <div class="head">
                    <img src="{{$rm->photo_url}}" alt="">
                    <h3><strong>{{$rm->name}}</strong></h3>
                  </div>
                </div>
              </div>

              <h5><strong>Berdasarkan rekam jejak {{$rm->nickname}} di bawah, apa impian-impian terdalamnya?</strong></h5>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$rm->urlname}}" data-width="335" data-numposts="2"></div>


            </div>
          </div>
        </div>
    

        @endforeach
        
      </div>
    </div>

    <div class="modal fade" id="SubmitFactModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Tambah Fakta <span id="type"></span> <span id="nickname"></span></h4>
          </div>
          <div class="modal-body">
            @if(Auth::check())
              <form method="POST" action="user/process_new_fact_submission">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Silahkan masukan fakta baru, jangan lupa, harus ditunjang bukti asli. Taruh ke link internet.</label>
                  <textarea class="form-control" name="text" id="" rows="3"></textarea>
                </div>
                <input type="hidden" name="place_id" value="{{$election->place->id}}">
                <input type="hidden" name="type_id" value="">
                <input type="hidden" name="candidate_id" value="">
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            @else
            Login dahulu untuk memasukan fakta baru. Kalau ingin anonimus karena faktanya terlalu sensitif, ikuti petunjuk berikut. 
            @endif
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    <script>
      $(document).ready(function(){
        $('.panel-body > .pull-right.glyphicon-plus').click(function (e) {
          $("#SubmitFactModal input[name='eternal_url']").val("");
          $("#SubmitFactModal input[name='text']").val("");
          $("#SubmitFactModal input[name='type_id']").val( $(this).data("fact-type") );
          $("#SubmitFactModal input[name='candidate_id']").val( $(this).data("candidate") );
          $("#SubmitFactModal span#nickname").html( $(this).data("nickname") );
          $("#SubmitFactModal span#type").html( $(this).data("fact-type-name") );
        });
        
        $(".div-replace-reference").hide();
        $('.toggle-replace-reference').click(function(){
          $('#replaceReference-'+$(this).data('id') ).slideToggle("slow");
        });
      });
    </script>
@endsection