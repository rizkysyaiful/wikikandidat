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

  @media (min-width: 768px) {
    .container {
      width: 750px;
    }
  }
  @media (min-width: 992px) {
    .container {
      width: 970px;
    }
  }
  @media (min-width: 1200px) {
    .container {
      width: 1170px;
    }
  }
  .select-candidate {
    padding-bottom: 2%;
  }
</style>

@endsection

@section('content')
    <div class="container-fluid">
      <h1>{{$election->name}}</h1>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Cari Pemilihan Lain</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          @php
            $elections =  App\Election::all();
            $elections = $elections->sortBy('name');
          @endphp
          @foreach($elections as $e)
            <?php
              if($e->place->level == 1)
                $prefix = "Prov.";
              if($e->place->level == 2)
                $prefix = "Kota";
              if($e->place->level == 3)
                $prefix = "Kab.";
            ?>
            <li><a href="{{url($e->urlname, [], $secure)}}">{{$prefix}} {{$e->place->name}}</a></li>
          @endforeach
        </ul>
      </div>
      <hr>
      @if($election->description != "")
      <div class='row'>
        @php
          $videos = explode(", ", $election->description);
        @endphp
        @foreach($videos as $v)
          <div class="col-sm-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$v}}" allowfullscreen></iframe>
            </div>
          </div>
        @endforeach
      </div>
      @endif
      <h3 class="text-center">Head to Head</h3>
      <div class='row col-md-12'>
        <div class="row select-candidate form-group">
          <form action="{{url(url()->current(), [], $secure)}}" name='candidate' id='candidate' method='POST'>
            <div class="col-md-6">
              <select name='candidate1' class='form-control'>
              @foreach($couples as $couple)
                <option value="{{$couple->id}}" <?php if(($couple->candidate_id) === $c->id) echo "selected" ?>> {{App\Candidate::find($couple->candidate_id)->nickname}} - {{App\Candidate::find($couple->running_mate_id)->nickname}} </option>
              @endforeach
              <select>
            </div>
            <div class="col-md-6">
              <select name='candidate2' class='form-control'>
              @foreach($couples as $couple)
                <option value="{{$couple->id}}" <?php if(($couple->candidate_id) === $c2->id) echo "selected" ?>> {{App\Candidate::find($couple->candidate_id)->nickname}} - {{App\Candidate::find($couple->running_mate_id)->nickname}} </option>
              @endforeach
              <select>
            </div>
            {!! csrf_field() !!}
          </form>
        </div>
      </div>
      <div class="row">
        <?php
          $types =  App\Type::all();
        ?>
          <div class="candidate1 col-md-6 col-sm-12">

          <div class="col-md-6 col-sm-6">
            <div class="panel panel-default" >
              <div class="panel-body">
                <div class="head">
                  <img src="{{$rm->photo_url}}" alt="">
                  <h3><strong>{{$rm->name}}</strong></h3>

                </div>
              </div>
            </div>

            <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$rm->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
            <div class="fb-comments" data-href="https://wikikandidat.com/{{$rm->urlname}}" data-width="335" data-numposts="2"></div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="panel panel-default" >
              <div class="panel-body">
                <div class="head">
                  <img src="{{$c->photo_url}}" alt="">
                  <h3><a href="{{url($c->urlname, [], $secure)}}"><strong>{{$c->name}}</strong></a></h3>
                  <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{{$c->urlname}}" data-annotation="inline"></div>
                </div>
              </div>
            </div>

            <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$c->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
            <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="2"></div>
          </div>
        </div>
        <div class="candidate2 col-md-6 col-sm-6">
        <div class="col-md-6 col-sm-6">
          <div class="panel panel-default" >
            <div class="panel-body">
              <div class="head">
                <img src="{{$c2->photo_url}}" alt="">
                <h3><a href="{{url($c2->urlname, [], $secure)}}"><strong>{{$c2->name}}</strong></a></h3>
                <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{{$c2->urlname}}" data-annotation="inline"></div>
              </div>

            </div>
          </div>

          <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$c2->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
          <div class="fb-comments" data-href="https://wikikandidat.com/{{$c2->urlname}}" data-width="335" data-numposts="2"></div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="panel panel-default" >
            <div class="panel-body">
              <div class="head">
                <img src="{{$rm2->photo_url}}" alt="">
                <h3><strong>{{$rm2->name}}</strong></h3>
              </div>
            </div>
          </div>

          <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$rm2->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
          <div class="fb-comments" data-href="https://wikikandidat.com/{{$rm2->urlname}}" data-width="335" data-numposts="2"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-default" >
                        <div class="panel-body">
                          <strong>Pendidikan:</strong><br>
                          {!!$rm->pendidikan!!}
                        </div>
                      </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default" >
                        <div class="panel-body">
                          <strong>Pendidikan:</strong><br>
                          {!!$c->pendidikan!!}
                        </div>
                      </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default" >
                        <div class="panel-body">
                          <strong>Pendidikan:</strong><br>
                          {!!$c2->pendidikan!!}
                        </div>
                      </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default" >
          <div class="panel-body">
            <strong>Pendidikan:</strong><br>
            {!!$rm2->pendidikan!!}
          </div>
        </div>
      </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default" >
        <div class="panel-body">
          <strong>Karir &amp; Organisasi:</strong><br>
          {!!$rm->karir!!}
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default" >
        <div class="panel-body">
          <strong>Karir &amp; Organisasi:</strong><br>
          {!!$c->karir!!}
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default" >
        <div class="panel-body">
          <strong>Karir &amp; Organisasi:</strong><br>
          {!!$c2->karir!!}
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default" >
        <div class="panel-body">
          <strong>Karir &amp; Organisasi:</strong><br>
          {!!$rm2->karir!!}
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Penghargaan dari organisasi:</strong><br>
        {!!$rm->penghargaan!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Penghargaan dari organisasi:</strong><br>
        {!!$c->penghargaan!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Penghargaan dari organisasi:</strong><br>
        {!!$c->penghargaan!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Penghargaan dari organisasi:</strong><br>
        {!!$c->penghargaan!!}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data lembaga pemerintah:</strong><br>
        {!!$rm->sumber_pemerintah!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data lembaga pemerintah:</strong><br>
        {!!$c->sumber_pemerintah!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data lembaga pemerintah:</strong><br>
        {!!$c2->sumber_pemerintah!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data lembaga pemerintah:</strong><br>
        {!!$rm2->sumber_pemerintah!!}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
        {!!$rm->sumber_non_pemerintah!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
        {!!$c->sumber_non_pemerintah!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
        {!!$c2->sumber_non_pemerintah!!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default" >
      <div class="panel-body">
        <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
        {!!$rm2->sumber_non_pemerintah!!}
      </div>
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
        $('#candidate').change(function() {
          $('#candidate').submit();
        });
      });
    </script>
@endsection
