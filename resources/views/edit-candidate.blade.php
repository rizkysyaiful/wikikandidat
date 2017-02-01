<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
Edit Candidate
@endsection

@section('head')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css', $secure)}}">
<link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css', $secure)}}">
<link rel="stylesheet" href="{{asset('css/select2.min.css', $secure)}}">
@endsection

@section('content')
<div class="container">
	<h1>Edit Kandidat <small><br>Spesial buat sesi entri data saat masih ketemu langsung</small></h1>
	<hr>
	<table id="table_id" class="display">
    <thead>
        <tr>
        	<th>Pilkada</th>
            <th>Nama</th>
            <th>Pendidikan</th>
            <th>Karir</th>
            <th>Penghargaan</th>
            <th>Sumber Pemerintah</th>
            <th>Sumber Non Pemerintah</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    	@php
    		$candidates = App\Candidate::all();
    	@endphp
    	@foreach($candidates as $c)
        <tr>
        	<?php $e = App\Election::find($c->election_id); ?>
        	<td><a href="{{url($e->urlname, [], $secure)}}">{{$e->place->name}}</a></td>
            <td>{{$c->name}}</td>
            <td>
            	{!!$c->pendidikan!!}
            </td>
            <td>
            	{!!$c->karir!!}
            </td>
            <td>
            	{!!$c->penghargaan!!}
            </td>
            <td>
            	{!!$c->sumber_pemerintah!!}
            </td>
            <td>
            	{!!$c->sumber_non_pemerintah!!}
            </td>
            <td>
            <button type="submit"
	    			class="btn btn-edit btn-xs btn-default"
	    			data-toggle="modal"
	    			data-target="#myModal"
	    			data-candidate_id = "{{$c->id}}"
	    			data-name = "{{$c->name}}"
	    			data-nickname = "{{$c->nickname}}"
	    			data-urlname = "{{$c->urlname}}"
	    			@php
	    				if($c->birthdate != null){
	    					$birthdate = explode("-", $c->birthdate);
	    				}
			    	@endphp
			    	@if($c->birthdate != null)
						data-year = "{{$birthdate[0]}}"
		    			data-month = "{{$birthdate[1]}}"
		    			data-date = "{{$birthdate[2]}}"
			    	@endif
			    	data-birthcity="{{$c->birthcity}}"
	    			data-pendidikan="{{$c->pendidikan}}"
	    			data-karir="{{$c->karir}}"
	    			data-photo_url="{{$c->photo_url}}"
					data-penghargaan="{{$c->penghargaan}}"
					data-sumber_pemerintah="{{htmlentities($c->sumber_pemerintah)}}"
					data-sumber_non_pemerintah="{{htmlentities($c->sumber_non_pemerintah)}}"
					data-election_id="{{$c->election_id}}"
	    			>Edit</button>
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
        <h4 class="modal-title" id="myModalLabel">Edit Candidate</h4>
      </div>
      <div class="modal-body">
		<form action="{{url('admin/edit-candidate', [], $secure)}}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="candidate_id">

			<div class="form-group">
				<label>Nama Lengkap</label>
				<input name="name" type="text" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Nama Panggilan</label>
				<input name="nickname" type="text" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Nama URL (huruf kecil semua, tanpa spasi, _ boleh)</label>
				<input name="urlname" type="text" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Photo URL (contoh https://pilkada2017.kpu.go.id/img/paslon//2407/2407_foto-kd_1_.jpg)</label>
				<input name="photo_url" type="text" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Tempat Lahir (cari di ijazah, kosongkan jika tidak ada informasi)</label>
				<input name="birthcity" type="text" class="form-control">
			</div>

			<div class="form-inline">
				<div class="form-group">
					<label>Tanggal Lahir (kosongkan jika tidak ada informasi)</label><br>
					<select name="month" class="form-control">
						<option value="">Tidak ada informasi</option>
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
					<input name="date" type="number" class="form-control" min="1" max="31" placeholder="DD">
					<input name="year" type="number" class="form-control" min="1900" max="2000" placeholder="YYYY">
				</div>
			</div>

			<div class="form-group">
	            <label>Pendidikan</label>
	            <textarea 	class="form-control"
            				style="width:100%;"
							name="pendidikan"
	            ></textarea>
	        </div>
			<div class="form-group">
	            <label>Karir</label>
	            <textarea 	class="form-control"
            				style="width:100%;"
							name="karir"
	            ></textarea>
	        </div>
	        <div class="form-group">
	            <label>Penghargaan</label>
	            <textarea 	class="form-control"
            				style="width:100%;"
							name="penghargaan"
	            ></textarea>
	        </div>
	        <div class="form-group">
	            <label>Sumber Pemerintah (buat link, scroll sampai ada tombol karena ada bug)</label>
	            <textarea 	class="form-control"
            				style="width:100%;"
							name="sumber_pemerintah"
	            ></textarea>
	        </div>
	        <div class="form-group">
	            <label>Sumber Non Pemerintah (sebelum buat link, scroll sampai ada tombol karena ada bug)</label>
	            <textarea 	class="form-control"
            				style="width:100%;"
							name="sumber_non_pemerintah"
	            ></textarea>
	        </div>
	        <div class="form-group">
	        	@php
	        		$elections = App\Election::all();
	        		$elections = $elections->sortByDesc('created_at');
	        	@endphp
	        	<select name="election_id">
                @foreach($elections as $e)
                    <option value="{{$e->id}}">{{$e->name}}</option>
                @endforeach
                </select>
	        </div>
	        <button type="submit" class="btn btn-primary">Perbarui</button>
		</form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')

	<script type="text/javascript" src="{{asset('js/select2.full.min.js', $secure)}}"></script>	

	<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js', $secure)}}"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$(".btn-edit").click(function(){
				$("#myModal input[name='candidate_id']").val($(this).data('candidate_id'));
				$("#myModal input[name='name']").val($(this).data('name'));
				$("#myModal input[name='nickname']").val($(this).data('nickname'));
				$("#myModal input[name='urlname']").val($(this).data('urlname'));
				$("#myModal input[name='photo_url']").val($(this).data('photo_url'));
				$("#myModal input[name='year']").val($(this).data('year'));
				$("#myModal select[name='month']").val( $(this).data('month'))
				$("#myModal input[name='date']").val($(this).data('date'));
				$("#myModal input[name='birthcity']").val($(this).data('birthcity'));


				var editorObj = $("#myModal textarea[name='pendidikan']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('pendidikan'));

				var editorObj = $("#myModal textarea[name='karir']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('karir'));

				var editorObj = $("#myModal textarea[name='penghargaan']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('penghargaan'));

				var editorObj = $("#myModal textarea[name='sumber_pemerintah']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('sumber_pemerintah'));

				var editorObj = $("#myModal textarea[name='sumber_non_pemerintah']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('sumber_non_pemerintah'));

				$("#myModal select[name='election_id']").val( $(this).data('election_id'))
			});

		    $('#table_id').DataTable({
		    });
		} );
	</script>
	
	<script src="{{asset('js/bootstrap3-wysiwyg/wysihtml5x-toolbar.min.js', $secure)}}"></script>
    <script src="{{asset('js/bootstrap3-wysiwyg/handlebars.runtime.min.js', $secure)}}"></script>
    <script src="{{asset('js/bootstrap3-wysiwyg/bootstrap3-wysihtml5.min.js', $secure)}}"></script>
    <script>
      $('textarea').wysihtml5({
        toolbar: {
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false, //Button to change color of font  
            "blockquote": false, //Blockquote 
        },
        "size": "xs"
      });
      window.getSelection().removeAllRanges();
    </script>
@endsection