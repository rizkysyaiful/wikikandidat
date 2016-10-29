@extends('layouts.app')

@section('title')
Home 
@endsection

@section('head')
@endsection

@section('content')
<div class="container">
    <span class="pull-right">Login sebagai {{Auth::user()->name}}</span>
    <h1>Home</h1>
<!--    <div class="btn-group btn-group-lg" role="group" aria-label="...">
      <button type="button" class="btn btn-default">Antrian Verifikasi</button>
      <button type="button" class="btn btn-default">Middle</button>
      <button type="button" class="btn btn-default">Right</button>
    </div>
-->
    <hr>

    @if(Auth::user()->is_verifier)
    <?php
      $jobs = App\Reference::where([
            ['first_verifier_id', '=', Auth::user()->id],
        ])->orderBy('created_at', 'desc')->get();
    ?>
    <h2>Tugas sebagai Verifikator Pertama</h2>
    @each('loops.verify-fact', $jobs, 'j')
    <hr>
    <?php
      $jobs = App\Reference::where([
            ['second_verifier_id', '=', Auth::user()->id],
            ['first_verifier_id', '=', null],
        ])->orderBy('created_at', 'desc')->get();
    ?>
    <h2>Tugas sebagai Verifikator Kedua</h2>
    @each('loops.verify-fact', $jobs, 'j')
    <hr>
    <?php
      $jobs = App\Reference::where([
            ['third_verifier_id', '=', Auth::user()->id],
            ['second_verifier_id', '=', null],
        ])->orderBy('created_at', 'desc')->get();
    ?>
    <h2>Tugas sebagai Verifikator Ketiga</h2>
    @each('loops.verify-fact', $jobs, 'j')
    @endif

</div>
@endsection
