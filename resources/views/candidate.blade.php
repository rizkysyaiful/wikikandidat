<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
{{$c->name}}
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
      <h1>{{$c->name}}</h1>
      <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{{$c->urlname}}" data-annotation="inline"></div>
      <hr>
      <div class="row">
        <div class="col-md-4">

          <div class="panel panel-default" >
            <div class="panel-body">
              <div class="head">
                <img src="{{$c->photo_url}}" alt="">
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4">

          <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Pendidikan:</strong><br>
                  {!!markdown($c->pendidikan)!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Karir &amp; Organisasi:</strong><br>
                  {!!markdown($c->karir)!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Sumber data lembaga pemerintah:</strong><br>
                  {!!markdown($c->sumber_pemerintah)!!}
                </div>
              </div>

              <div class="panel panel-default" >
                <div class="panel-body">
                  <strong>Sumber data non-lembaga pemerintah (silahkan validasi sendiri kebenarannya):</strong><br>
                  {!!markdown($c->sumber_non_pemerintah)!!}
                </div>
              </div>
          
        </div>
        <div class="col-md-4">
          
          <h5><strong>Ceritakan pengalaman pribadi kamu dengan {{$c->nickname}}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
          <div class="fb-comments" data-href="https://wikikandidat.com/{{$c->urlname}}" data-width="335" data-numposts="2"></div>

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