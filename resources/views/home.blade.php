@extends('layouts.app')

@section('title')
Home 
@endsection

@section('content')
<div class="container">
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
      $jobs = $user->jobs_as_first;
      $jobs = $jobs->merge($user->jobs_as_second);
      $jobs = $jobs->merge($user->jobs_as_third); 
      $jobs = $jobs->sortByDesc('created_at');
    ?>
    @foreach( $jobs as $j )
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    {{$j->eternal_url}}<br>
                    sebagai bukti dari fakta "{{$j->fact->text}}" 
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
    @endif

</div>
@endsection
