@extends('layouts.app')

@section('title')
DKI Jakarta - Pilkada 2017 
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
    list-style-position: inside;
    padding-left:0;
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
    cursor: pointer;
  }
  .panel-body > h5{
    color: #008cba;
    font-weight: bold;
    margin-top: 0;
  }
  .panel-body > .pull-right.glyphicon-plus{
    font-size: 20px;
    margin-top: -5px;
    font-weight: bold;
    cursor: pointer;
  }
  .random-quote{
    max-width: 300px;
    margin-top: 25px;
    text-align: right;
  }
  .well > img{
    width: 100%;
  }
</style>
@endsection

@section('content')
    <div class="container">
      <span class="pull-right random-quote"><em>"Demokrasi tidak bisa hanya berisi pemilu, yang hampir selalu fiktif dan diatur oleh tuan tanah serta politisi profesional."<br>~ Che Guavara</em></span>
      <h1>Pilkada 2017</h1>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Aceh</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Banda Aceh</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div>
      <hr>
      <div class="row">
        <?php
          $types =  App\Type::all();
        ?>
        @foreach($election->couples as $co)
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
                    <h3><strong>{{$c->name}}</strong></h3>
                  </div>
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(235, 244, 255);">
                <?php
                  $type_id = $types->where('name', 'Careers')->first()->id;
                  $facts = $c->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal"
                data-candidate="{{$c->id}}"
                data-nickname="{{$c->nickname}}" data-fact-type-name="Karir"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Karir:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(235, 255, 245);">
                <?php
                  $type_id = $types->where('name', 'Educations')->first()->id;
                  $facts = $c->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal" data-candidate="{{$c->id}}"
                data-nickname="{{$c->nickname}}" data-fact-type-name="Pendidikan"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Pendidikan:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(255, 235, 235);">
                <?php
                  $type_id = $types->where('name', 'Contributions')->first()->id;
                  $facts = $c->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal" data-candidate="{{$c->id}}"
                data-nickname="{{$c->nickname}}" data-fact-type-name="Kontribusi"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Kontribusi ke Organisasi:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(235, 236, 255);">
                <?php
                  $type_id = $types->where('name', 'Achievements')->first()->id;
                  $facts = $c->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal" data-candidate="{{$c->id}}"
                data-nickname="{{$c->nickname}}" data-fact-type-name="Prestasi"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Prestasi:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(255, 251, 235);">
                <?php
                  $type_id = $types->where('name', 'Controversies')->first()->id;
                  $facts = $c->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal" data-candidate="{{$c->id}}"
                data-nickname="{{$c->nickname}}" data-fact-type-name="Kontroversi"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Kontroversi:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

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

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(235, 244, 255);">
                  <?php
                    $type_id = $types->where('name', 'Careers')->first()->id;
                    $facts = $rm->facts->where('type_id', $type_id)->where('is_verified', true);
                    $first = "first";
                  ?>
                  <span class="glyphicon glyphicon-plus pull-right" 
                  data-toggle="modal"
                  data-target="#SubmitFactModal" data-candidate="{{$rm->id}}"
                  data-nickname="{{$rm->nickname}}" data-fact-type-name="Karir"
                  data-fact-type="{{$type_id}}"
                  aria-hidden="true"></span>
                  <h5>Karir:</h5>
                  @foreach($facts as $i => $f)
                  <div class="data {{$first}}">
                    <?php $first = ""; ?>
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                      bukti
                    </span>
                    <strong>
                      @if(isset($f->year_start))
                        {{$f->year_start}} -
                      @endif
                      {{$f->year_end}}
                    </strong><br>
                    {!!markdown($f->text)!!}
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(235, 255, 245);">
                  <?php
                    $type_id = $types->where('name', 'Educations')->first()->id;
                    $facts = $rm->facts->where('type_id', $type_id)->where('is_verified', true);
                    $first = "first";
                  ?>
                  <span class="glyphicon glyphicon-plus pull-right" 
                  data-toggle="modal"
                  data-target="#SubmitFactModal" data-candidate="{{$rm->id}}"
                  data-nickname="{{$rm->nickname}}" data-fact-type-name="Pendidikan"
                  data-fact-type="{{$type_id}}"
                  aria-hidden="true"></span>
                  <h5>Pendidikan:</h5>
                  @foreach($facts as $i => $f)
                  <div class="data {{$first}}">
                    <?php $first = ""; ?>
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                      bukti
                    </span>
                    <strong>
                      @if(isset($f->year_start))
                      {{$f->year_start}} -
                      @endif
                      {{$f->year_end}}
                    </strong><br>
                    {!!markdown($f->text)!!}
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(255, 235, 235);">
                <?php
                  $type_id = $types->where('name', 'Contributions')->first()->id;
                  $facts = $rm->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                    data-toggle="modal"
                    data-target="#SubmitFactModal" data-candidate="{{$rm->id}}"
                    data-nickname="{{$rm->nickname}}" data-fact-type-name="Kontribusi"
                    data-fact-type="{{$type_id}}"
                    aria-hidden="true"></span>
                <h5>Kontribusi ke Organisasi:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(235, 236, 255);">
                <?php
                  $type_id = $types->where('name', 'Achievements')->first()->id;
                  $facts = $rm->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal" data-candidate="{{$rm->id}}"
                data-nickname="{{$rm->nickname}}" data-fact-type-name="Prestasi"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Prestasi:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body" style="background-color: rgb(255, 251, 235);">
                <?php
                  $type_id = $types->where('name', 'Controversies')->first()->id;
                  $facts = $rm->facts->where('type_id', $type_id)->where('is_verified', true);
                  $first = "first";
                ?>
                <span class="glyphicon glyphicon-plus pull-right" 
                data-toggle="modal"
                data-target="#SubmitFactModal" data-candidate="{{$rm->id}}"
                data-nickname="{{$rm->nickname}}" data-fact-type-name="Kontroversi"
                data-fact-type="{{$type_id}}"
                aria-hidden="true"></span>
                <h5>Kontroversi:</h5>
                @foreach($facts as $i => $f)
                <div class="data {{$first}}">
                  <?php $first = ""; ?>
                  <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#modal-{{$f->id}}">
                    bukti
                  </span>
                  <strong>
                    @if(isset($f->year_start))
                    {{$f->year_start}} -
                    @endif
                    {{$f->year_end}}
                  </strong><br>
                  {!!markdown($f->text)!!}
                </div>
                @endforeach
                </div>
              </div>

            </div>
          </div>

  <!--        <h5>Testimoni:</h5>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="5"></div> -->
        </div>
    
        <?php
          $facts = $c->facts;
          $facts = $facts->merge($rm->facts);
        ?>

        @foreach($facts as $f)
          <div class="modal fade" id="modal-{{$f->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Bukti<br><small>dari Fakta "{{$f->text}}"</small></h4>
                </div>
                <div class="modal-body">
                  <?php
                    $references = $f->references
                      ->where('first_verifier_id', null)
                      ->where('second_verifier_id', null)
                      ->where('third_verifier_id', null)
                      ->where('successor_id', null);
                  ?>
                  @foreach($references as $r)
                  <div class="well well-sm">
                    <img class="loading_gif" src="{{asset('img/loading.gif')}}">
                    <img class="lazy_load" data-src="https://docs.google.com/uc?id={{$r->photo_id}}">
                    <br>
                    <div class="row">
                      <div class="col-sm-4">
                        <span><strong>Pengaju bukti</strong>:<br>
                        <img style="display: inline;" class="media-object" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $r->submitter->email ) ) )}}?s=20">
                        <a href="user/{{$r->submitter->username}}">{{$r->submitter->name}}</a></span>
                      </div>
                      <div class="col-sm-3">
                        <strong>Sumber Bukti</strong>:<br>
                        <a href="{{$r->eternal_url}}">{{$r->title}}</a>
                      </div>
                      <div class="col-sm-5">
                        <button data-id="{{$r->id}}" class="toggle-replace-reference btn btn-xs btn-primary pull-right">Ada yang lebih valid?</button>
                      </div>
                    </div>
                    
                    <strong>Verifikator</strong>:<br>
                    @foreach($r->verifications as $v)
                    <div>
                      <img style="display: inline;" class="media-object" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $v->verifier->email ) ) )}}?s=20"> <a href="user/{{$v->verifier->username}}" title="">{{$v->verifier->name}}</a>: {{$v->comment}}
                    </div>
                    @endforeach

                    <div id="replaceReference-{{$r->id}}" class="div-replace-reference" style="text-align: center;">
                      <form id="ChangeReference" method="POST" action="user/change-reference">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Taruh alamat internet dari bukti serupa namun dengan sumber lebih kredibel." name="url">
                        </div>
                        <input type="hidden" name="reference_id" value="{{$r->id}}">
                        <input type="hidden" name="fact_id" value="{{$f->id}}">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                  </div>
                  @endforeach
                  <hr>
                  <div style="text-align: center;">
                    <p>
                      Merasa ada yang kurang di teks fakta "{{$f->text}}"?  
                    </p>
                    <p>
                      Bantu Wikikandidat melengkapinya dengan berikan bukti baru. Akan ditambahkan kalau memang itu sesuatu yang baru dan valid.
                    </p>
                    <?php
                      // kalau fakta ini punya reference tambahan yang sedang diproses,
                      $references = App\Reference::where('fact_id', '=', $f->id)
                        ->where(function($query){
                          $query->whereNotNull('first_verifier_id')
                          ->orWhere('second_verifier_id', '<>', null)
                          ->orWhere('third_verifier_id', '<>', null);
                        })
                        ->get();
                    ?>
                    @if($references->count() == 0)
                      <form id="AddReference" method="POST" action="user/add-reference">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Taruh alamat http:// atau https:// dari bukti." name="url">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Apa yang baru & penting dari bukti itu?" name="reason">
                        </div>
                        <input type="hidden" name="fact_id" value="{{$f->id}}">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    @else
                      @if(Auth::check())
                        <div class="bs-callout bs-callout-primary">
                          <p>
                            Mohon maaf. Sekarang kamu harus mengantri. Karena ada sebuah bukti yang sedang diproses tiga mahasiswa acak.
                          </p>
                          <p>
                            Nanti akan dibuat fitur, yang akan mengirim email ke kamu kalau proses sudah selesai. Jadi kamu sudah bisa tambahkan bukti baru yang melengkapi fakta ini. Sekarang fiturnya belum jadi. Kamu rajin-rajin cek halaman ini dulu aja ya.. :)
                          </p>
                        </div>
                      @else
                        Daftar ya...
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        @endforeach
        
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="SubmitFactModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Tambah Fakta <span id="type"></span> <span id="nickname"></span></h4>
          </div>
          <div class="modal-body">
            @if(Auth::check())
              <form id="AddFactForm" method="POST" action="user/submit-fact" >
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Link ke Bukti Fakta</label>
                  <input type="text" class="form-control" placeholder="Taruh alamat http:// atau https:// dari bukti." name="url">
                </div>
                <div class="form-group">
                  <label>Berdasarkan bukti tersebut, adalah fakta bahwa <span id="nickname"></span> pernah...</label>
                  <input type="text" class="form-control" placeholder="Penjelasan singkat fakta tersebut." name="text">
                </div>
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
        $('.modal').on("show.bs.modal", function () {
          $(".loading_gif").show();
          $('.lazy_load').each(function(){
            var img = $(this);
            img.attr('src', img.data('src'));
            $(this).on('load', function(){
              $(".loading_gif").hide();
            });
          });
        });
        $(".div-replace-reference").hide();
        $('.toggle-replace-reference').click(function(){
          $('#replaceReference-'+$(this).data('id') ).slideToggle("slow");
        });
      });
    </script>
@endsection