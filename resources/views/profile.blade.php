@extends('layouts.app')

@section('title')
{{$user->name}}
@endsection

@section('head')
<style type="text/css">
	.well{
		max-width: 481px;
	}
	.well ol,ul{
		padding-left: 17px;
	}
</style>
@endsection

@section('content')
	<div class="container reading">
		@if($user->is_verifier)
		<span class="pull-right" style="text-align: right;margin-top: 25px;">
			<strong>
				Verifikator<br>
				{{$user->university->name}}
			</strong>
		</span>
		@endif
		<h1>{{$user->name}}</h1>
		<div class="media">
			<div class="media-left">
				<img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $user->email ) ) )}}?s=120">
			</div>
			<div class="media-body">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#submits" aria-controls="submits" role="tab" data-toggle="tab">Kontribusi Fakta</a></li>
				    <li role="presentation"><a href="#edits" aria-controls="edits" role="tab" data-toggle="tab">Verifikasi Fakta</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				    <div role="tabpanel" class="tab-pane active" id="submits">
				    	<?php
						$submissions = $user->submissions;
						?>
						@foreach($submissions as $s)
							<div class="well well-sm">
								<span class="pull-right">
									@if($s->is_rejected === 1)
									<strong class="text-danger">Ditolak</strong>
									@elseif($s->is_rejected === null)
									<strong class="text-info">Sedang Diproses</strong>
									@elseif($s->is_rejected === 0)
									<strong class="text-success">Diterima</strong>
									@endif
								</span>
								<span class="text-muted">{{(new DateTime($s->created_at))->format("d M Y")}}</span><br>
								"{{$s->text}}" &#10142; <a href="{{url('#'.$s->candidate->urlname)}}">{{$s->candidate->name}}, {{App\Type::find($s->type_id)->name}}</a><br>
								@if($s->is_rejected === 1)
									<span class="text-muted">Alasan ditolak:</span> "{{$s->rejection_reason}}"
								@endif
							</div>
						@endforeach
				    </div>
				    <div role="tabpanel" class="tab-pane" id="edits">
				    	@if($user->is_verifier)
							<?php
							$edits = $user->edits; 
							?>
							@foreach($edits as $e)
							<div class="well well-sm">
								<a class="pull-right" href="">{{$e->submission->candidate->name}}</a>
								<span class="text-muted">{{(new DateTime($e->created_at))->format("d M Y")}}</span><br>
								<u>{{Helper::wk_date($e->date_start, $e->date_finish)}}</u>
								{!!markdown($e->text)!!}
								<span class="text-muted">Hasil edit di atas adalah respon dari</span><br>
								<img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $e->submission->submitter->email ) ) )}}?s=15"> <a href="{{url('user/'.$e->submission->submitter->username)}}">{{$e->submission->submitter->name}}</a>: "{{$e->submission->text}}"
							</div>
							@endforeach
				    	@else
				    		{{$user->name}} belum terdaftar sebagai verifikator. Hanya mahasiswa program sarjana atau diploma yang bisa jadi verifikator. Syarat-syarat berikutnya bisa dibaca di <a href="#">sini</a>. 
				    	@endif
				    </div>
				  </div>
				
			</div>
		</div>
	</div>
@endsection

@section('js')
@endsection