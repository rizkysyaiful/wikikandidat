@extends('layouts.app')

@section('title')
{{$user->name}}
@endsection

@section('head')
@endsection

@section('content')
	<div class="container reading">
		<h1>{{$user->name}}</h1>
		<div class="media">
			<div class="media-left">
				<img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $user->email ) ) )}}?s=120">
			</div>
			<div class="media-body">
				<div>

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
								"{{$s->text}}" &xrarr; <a href="{{$s->candidate->urlname}}">{{$s->candidate->name}}, {{App\Type::find($s->type_id)->name}}</a>
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
								{{$e->text}}
							</div>
							@endforeach
				    	@else
				    		Ups, aku bukan seorang
				    	@endif 
				    </div>
				  </div>

				</div>

				
			</div>
		</div>
	</div>
@endsection

@section('js')
@endsection