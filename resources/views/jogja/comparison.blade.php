<?php
    $secure = App::environment('production') ? true : NULL;
?>

@extends('jogja.layouts.app')

@php
  $lc = $left->candidate;
  $lrm = $left->running_mate;
  $rc = $right->candidate;
  $rrm = $right->running_mate;
@endphp

@section('title')
{{$lc->nickname}} vs {{$rc->nickname}} | {{$election->name}}
@endsection

@section('head')
<style type="text/css">
  .couple-avatar-paslon-main.left .avatar:last-child {
    z-index: 3;
  }
</style>
@endsection

@section('content')
<div class="page-comparison">

  <div class="container">
    <a href="{{url($election->urlname, [], $secure)}}" class="btn btn-primary-o">
      &#8678; Kembali Pilih Pasangan
    </a>
    <div class="box title">
      <div class="text center">
        <h1 class="heading _title-list">{{$lc->nickname}}? Atau {{$rc->nickname}}?</h1>
        <h2 class="heading __sub-title-list">Untuk {{$election->place->name}}</h2>
        <div class="heading __period-list">Periode 2017-2022</div>
      </div>
    </div>

    <div class="container box">
      <div class="pure-g">
        <div class="pure-u-1-2">

          <div class="couple-avatar-paslon-main left">
            <div class="avatar">
              <img src="{{$lrm->photo_url}}" alt="" class="img-cover">
            </div>
            <div class="avatar">
              <img src="{{$lc->photo_url}}" alt="" class="img-cover">
            </div>
          </div>

          <div style="text-align: center; margin-top: 20px;">
            <h3>{{$lc->name}}</h3>
            <h3>&amp;</h3>
            <h3>{{$lrm->name}}</h3>
          </div>

        </div>
        <div class="pure-u-1-2">
          <div class="couple-avatar-paslon-main">
            <div class="avatar">
              <img src="{{$rc->photo_url}}" alt="" class="img-cover">
            </div>
            <div class="avatar">
              <img src="{{$rrm->photo_url}}">
            </div>
          </div>

          <div style="text-align: center; margin-top: 20px;">
            <h3>{{$rc->name}}</h3>
            <h3>&amp;</h3>
            <h3>{{$rrm->name}}</h3>
          </div>

        </div>
      </div>
      <div style="margin-top: 20px;">
        <span class="btn btn-primary-o" data-type="visi">
          Visi
        </span>
        <span class="btn btn-primary-o" data-type="program">
          Program
        </span>
        <span class="btn btn-primary-o" data-type="pendidikan">
          Pendidikan
        </span>
        <span class="btn btn-primary-o" data-type="karir">
          Karir
        </span>
        <span class="btn btn-primary-o" data-type="penghargaan">
          Penghargaan
        </span>
        <span class="btn btn-primary-o" data-type="dakwaan">
          Kasus Pidana
        </span>
        <span class="btn btn-primary-o" data-type="testimoni">
          Komentar Teman<sup>2</sup> Kamu
        </span>
      </div>
      <div class="pure-g">
      @php
        $both = [$left, $right];
      @endphp
      @foreach($both as $b)
        <div class="pure-u-1-2">
          <div class="couple-card-paslon __list">
            <div class="box visi">
              <div class="box__quote">
                {{$b->slogan}}
              </div>
            </div>
            <div class="box visi">
              <div class="box__title">
                Visi
              </div>
              {{$b->visi}}
            </div>
            <div class="box visi">
              <div class="box__title">
                Misi
              </div>
              {{$b->misi}}
            </div>
            <div class="box program">
              <div class="box__title">
                Program
              </div>
              {{$b->program}}
            </div>
            <div class="box pendidikan">
              <div class="box__title">
                {{$b->candidate->nickname}}
              </div>
              {{$b->candidate->pendidikan}}
            </div>
            <div class="box pendidikan">
              <div class="box__title">
                {{$b->running_mate->nickname}}
              </div>
              {{$b->running_mate->pendidikan}}
            </div>
            <div class="box karir">
              <div class="box__title">
                {{$b->candidate->nickname}}
              </div>
              {{$b->candidate->karir}}
            </div>
            <div class="box karir">
              <div class="box__title">
                {{$b->running_mate->nickname}}
              </div>
              {{$b->running_mate->karir}}
            </div>
            <div class="box penghargaan">
              <div class="box__title">
                {{$b->candidate->nickname}}
              </div>
              {{$b->candidate->penghargaan}}
            </div>
            <div class="box penghargaan">
              <div class="box__title">
                {{$b->running_mate->nickname}}
              </div>
              {{$b->running_mate->penghargaan}}
            </div>
            <div class="box dakwaan">
              <div class="box__title">
                {{$b->candidate->nickname}}
              </div>
              {{$b->candidate->dakwaan}}
            </div>
            <div class="box dakwaan">
              <div class="box__title">
                {{$b->running_mate->nickname}}
              </div>
              {{$b->running_mate->dakwaan}}
            </div>
            <div class="box testimoni">
              <div class="box__title">
                {{$b->candidate->nickname}}
              </div>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$b->candidate->urlname}}" data-width="350" data-numposts="4"></div>
            </div>
            <div class="box testimoni">
              <div class="box__title">
                {{$b->running_mate->nickname}}
              </div>
              <div class="fb-comments" data-href="https://wikikandidat.com/{{$b->running_mate->urlname}}" data-width="350" data-numposts="4"></div>
            </div>
            <hr>
            <div>
              Sumber Referensi
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>

  </div>

</div>
@endsection

@section('javascript')
  <script type="text/javascript">
  $(document).ready(function(){
    $(".__list > .box").hide();
    $(".visi").fadeIn();
    $("span.btn").click(function(){
      $(".__list > .box").hide();
      $("."+$(this).data("type")).fadeIn();
    });
  });
</script>
@endsection
