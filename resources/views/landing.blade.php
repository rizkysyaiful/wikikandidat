@extends('layouts.app')

@section('title')
DKI Jakarta - Pilkada 2017 
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
                data-target="#SubmitFactModal" data-candidate="{{$c->id}}"
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
                  {{$f->text}}
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
                  {{$f->text}}
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
                <h5>Kontribusi:</h5>
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
                  {{$f->text}}
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
                  {{$f->text}}
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
                  {{$f->text}}
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
                    {{$f->text}}
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
                    {{$f->text}}
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
                <h5>Kontribusi:</h5>
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
                  {{$f->text}}
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
                  {{$f->text}}
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
                  {{$f->text}}
                </div>
                @endforeach
                </div>
              </div>

            </div>
          </div>

  <!--        <h5>Testimoni:</h5>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="5"></div> -->
        </div>
    
        @foreach($c->facts as $f)
          @if(count($f->references) != 0)
          {{-- if di atas hanya karena seed-nya belum bagus --}}
          <div class="modal fade" id="modal-{{$f->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Bukti</h4>
                </div>
                <div class="modal-body">
                  @foreach($f->references as $r)
                  <a href="{{$r->eternal_url}}">{{$r->title}}</a><br>
                  <span>Data diajukan oleh: <a href="user/{{$r->submitter->username}}">{{$r->submitter->name}}</a></span><br>
                  <span>Diverifikasi secara terpisah oleh:
                    @foreach($r->verifications as $v)
                    <a href="user/{{$v->verifier->username}}">{{$v->verifier->name}}</a>
                    @endforeach
                  </span>
                  <hr>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
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
                <input type="text" class="form-control" placeholder="Taruh alamat http:// atau https:// dari bukti." name="eternal_url">
              </div>
              <div class="form-group">
                <label>Fakta bahwa...</label>
                <input type="text" class="form-control" placeholder="Penjelasan singkat fakta tersebut." name="text">
              </div>
              <input type="hidden" name="type_id" value="">
              <input type="hidden" name="candidate_id" value="">
              <input type="hidden" name="submitter_id" value="{{Auth::user()->id}}">
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
      $('.panel-body > .pull-right.glyphicon-plus').click(function (e) {
        $("#SubmitFactModal input[name='eternal_url']").val("");
        $("#SubmitFactModal input[name='text']").val("");
        $("#SubmitFactModal input[name='type_id']").val( $(this).data("fact-type") );
        $("#SubmitFactModal input[name='candidate_id']").val( $(this).data("candidate") );
        $("#SubmitFactModal span#nickname").html( $(this).data("nickname") );
        $("#SubmitFactModal span#type").html( $(this).data("fact-type-name") );
      });
    </script>
@endsection