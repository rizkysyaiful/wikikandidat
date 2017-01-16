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
      @php 
        $videos = explode(", ", $election->description);
      @endphp
      <div class="row">
        @foreach($videos as $v)
          <div class="col-sm-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$v}}" allowfullscreen></iframe>
            </div>  
          </div>
        @endforeach
      </div>
      <hr>
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

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Pendidikan:</strong><br>
                  {!!$c->pendidikan!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Karir &amp; Organisasi:</strong><br>
                  {!!$c->karir!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Penghargaan dari organisasi:</strong><br>
                  {!!$c->penghargaan!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Sumber data lembaga pemerintah:</strong><br>
                  {!!$c->sumber_pemerintah!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
                  {!!$c->sumber_non_pemerintah!!}
                </div>
              </div>

              <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$c->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="2"></div>

            </div>

            <div class="tab-pane fade" id="vice-tab-{{$co->id}}">

              <div class="panel panel-default" >
                <div class="panel-body">
                  <div class="head">
                    <img src="{{$rm->photo_url}}" alt="">
                    <h3><a href="{{url($rm->urlname, [], $secure)}}"><strong>{{$rm->name}}</strong></a></h3>
                  </div>
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Pendidikan:</strong><br>
                  {!!$rm->pendidikan!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Karir &amp; Organisasi:</strong><br>
                  {!!$rm->karir!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Penghargaan dari organisasi:</strong><br>
                  {!!$rm->penghargaan!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Sumber data lembaga pemerintah:</strong><br>
                  {!!$rm->sumber_pemerintah!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
                  {!!$rm->sumber_non_pemerintah!!}
                </div>
              </div>



              <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$rm->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$rm->urlname}}" data-width="335" data-numposts="2"></div>

            </div>
          </div>
        </div>
    

        @endforeach
        
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