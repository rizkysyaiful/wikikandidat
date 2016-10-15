@extends('layouts.app')

@section('title')
Home 
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
      $user = Auth::user();
    ?>
    <h2>Tugas sebagai Verifikator Pertama</h2>
    @each('loops.verify-fact', $user->jobs_as_first->sortByDesc('created_at'), 'j')
    <hr>
    <?php
      $jobs = $user->jobs_as_second;
      $jobs = $jobs->merge($user->jobs_as_third); 
      $jobs = $jobs->sortByDesc('created_at');
    ?>
    <h2>Tugas sebagai Verifikator Kedua &amp; Ketiga</h2>
    @each('loops.verify-fact', $jobs, 'j')
    @endif

</div>
@endsection
