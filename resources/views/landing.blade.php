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
 <!--     <ul class="nav nav-tabs">
        <li class="active"><a href="#primary-tab" class="btn-md" data-toggle="tab" aria-expanded="true">Calon Wakilkota</a></li>
        <li class=""><a href="#vice-tab" class="btn-md" data-toggle="tab" aria-expanded="false">Calon Wakil Walikota</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade active in" id="primary-tab"> -->
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
                      $facts = $c->facts->where('type_id', $types->where('name', 'Careers')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Karir:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $c->facts->where('type_id', $types->where('name', 'Contributions')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Kontribusi:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $c->facts->where('type_id', $types->where('name', 'Achievements')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Prestasi:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $c->facts->where('type_id', $types->where('name', 'Controversies')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Kontroversi:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $rm->facts->where('type_id', $types->where('name', 'Careers')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Karir:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $rm->facts->where('type_id', $types->where('name', 'Contributions')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Kontribusi:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $rm->facts->where('type_id', $types->where('name', 'Achievements')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Prestasi:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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
                      $facts = $rm->facts->where('type_id', $types->where('name', 'Controversies')->first()->id);
                      $first = "first";
                    ?>
                    <h5>Kontroversi:</h5>
                    @foreach($facts as $i => $f)
                    <div class="data {{$first}}">
                      <?php $first = ""; ?>
                      <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                        referensi
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

<!--                  <h5>Testimoni:</h5>
                  <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="5"></div> -->
            </div>    
            @endforeach
<!--          </div>
        </div>
        <div class="tab-pane fade" id="vice-tab"> 
          <div class="row"> 
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
          </div>
<!--        </div>
      </div> -->
      
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Referensi</h5>
          </div>
          <div class="modal-body">
            <a href="https://web.archive.org/web/20160916120336/http://www.surabaya.go.id/berita/8058-daftar-nama-&-alamat-walikota,-sekdakota-dan-asisten-pemerintah-kota-surabaya">Surabaya.go.id, 16 September 2016</a><br>
            <span>Data diajukan oleh:  <a href="#">Surip</a></span><br>
            <span>Diverifikasi secara terpisah oleh: <a href="#">Rizky</a>, <a href="#">Lulu</a></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    <script>
      $('.link-to-vice-tab').click(function (e) {
        e.preventDefault();
        $("a[href='#vice-tab']").click();
      });
    </script>
@endsection