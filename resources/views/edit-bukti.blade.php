@extends('layouts.app')

@section('title')
Edit Bukti
@endsection

@section('head')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
	<h1>Edit Bukti & Faktanya <small><br>Spesial buat sesi entri data saat masih ketemu langsung.</small></h1>
	<hr>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Kandidat</th>
            <th>Fakta</th>
            <th>Link ke Bukti</th>
            <th>Gambar</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    	@foreach($references as $r)
        <tr>
            <td>{{$r->fact->candidate->name}}</td>
            <td>{{$r->fact->text}}</td>
            <td><a href="{{$r->eternal_url}}" target="_blank">{{$r->title}}</a></td>
            <td><img style="width: 100%;" src="https://docs.google.com/uc?id={{$r->photo_id}}"></td>
            <td>{{$r->fact->year_start}}</td>
			<td>{{$r->fact->year_end}}</td>
			<td>
				<button type="button" class="btn btn-primary btn-xs btn-edit" data-toggle="modal" data-target="#myModal" 
				data-text="{{$r->fact->text}}"
				data-eternal-url="{{$r->eternal_url}}"
				data-title="{{$r->title}}"
				data-photo-id="{{$r->photo_id}}"
				data-year-start="{{$r->fact->year_start}}"
				data-year-end="{{$r->fact->year_end}}"
				data-reference-id="{{$r->id}}"
				data-fact-id="{{$r->fact->id}}"
				>
				  Edit
				</button>
			</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Bukti &amp; Faktanya</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="student/edit-reference-fact">
	        {{ csrf_field() }}
	        <input type="hidden" name="reference_id" value="">
	        <input type="hidden" name="fact_id" value="">
	        <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
	            <label>Teks fakta yang lebih sesuai</label>
	            <textarea class="form-control" name="text" rows="4"></textarea>
	            @if ($errors->has('text'))
	            <div class="has-error">
	                <span class="help-block">
	                    <strong>{{ $errors->first('text') }}</strong>
	                </span>
	            </div>
	            @endif
	        </div>
	        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
	            <label>Perilis bukti (nama media massa)</label>
	            <input type="text" class="form-control" value="" name="title">
	            @if ($errors->has('title'))
	            <div class="has-error">
	                <span class="help-block">
	                    <strong>{{ $errors->first('title') }}</strong>
	                </span>
	            </div>
	            @endif
	        </div>
	        <div class="form-group {{ $errors->has('eternal_url') ? ' has-error' : '' }}">
	            <label>Alamat Archive.org</label>
	            <textarea class="form-control" name="eternal_url" rows="3"></textarea>
	            @if ($errors->has('eternal_url'))
	            <div class="has-error">
	                <span class="help-block">
	                    <strong>{{ $errors->first('eternal_url') }}</strong>
	                </span>
	            </div>
	            @endif
	        </div>
	        <div class="form-group {{ $errors->has('photo_id') ? ' has-error' : '' }}">
	            <label>ID Google Drive Skrinsut Bukti</label>
	            <input type="text" class="form-control" placeholder="" value="" name="photo_id">
	            <img style="width: 100%;" src="">
	            @if ($errors->has('photo_id'))
	            <div class="has-error">
	                <span class="help-block">
	                    <strong>{{ $errors->first('photo_id') }}</strong>
	                </span>
	            </div>
	            @endif
	        </div>
	        <div class="form-group {{ $errors->has('year_start') ? ' has-error' : '' }}">
	            <label>Tahun Mulai</label>
	            <input type="number" class="form-control" placeholder="" value="" name="year_start">
	            @if ($errors->has('year_start'))
	            <div class="has-error">
	                <span class="help-block">
	                    <strong>{{ $errors->first('year_start') }}</strong>
	                </span>
	            </div>
	            @endif
	        </div>
	        <div class="form-group {{ $errors->has('year_end') ? ' has-error' : '' }}">
	            <label>Tahun Selesai / Tahun Terjadi</label>
	            <input type="number" class="form-control" placeholder="" value="" name="year_end">
	            @if ($errors->has('year_end'))
	            <div class="has-error">
	                <span class="help-block">
	                    <strong>{{ $errors->first('year_end') }}</strong>
	                </span>
	            </div>
	            @endif
	        </div>
	        <input type="hidden" name="fact_id" value="">
	        <input type="hidden" name="reference_id" value="">
	        <button type="submit" class="btn btn-primary">Perbarui</button>
	    </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
	<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$(".btn-edit").click(function(){
				$("#myModal textarea[name='text']").val( $(this).data('text') );
				$("#myModal textarea[name='eternal_url']").val( $(this).data('eternal-url') );
				$("#myModal input[name='title']").val( $(this).data('title') );
				$("#myModal input[name='photo_id']").val( $(this).data('photo-id') );
				$("#myModal img").attr( 'src', 'https://docs.google.com/uc?id='+$(this).data('photo-id') );
				$("#myModal input[name='year_start']").val( $(this).data('year-start') );
				$("#myModal input[name='year_end']").val( $(this).data('year-end') );
				$("#myModal input[name='reference_id']").val( $(this).data('reference-id') );
				$("#myModal input[name='fact_id']").val( $(this).data('fact-id') );
			});

		    $('#table_id').DataTable({
		    });
		} );
	</script>
@endsection