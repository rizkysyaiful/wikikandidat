<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
Edit Couple
@endsection

@section('head')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css', $secure)}}">
<link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css', $secure)}}">
<link rel="stylesheet" href="{{asset('css/select2.min.css', $secure)}}">
@endsection

@section('content')
<div class="container">
	<h1>Agar Pengguna Melihat Data Pasangan yang Detail!<br><small><a href="https://pilkada2017.kpu.go.id/paslon/tahapPenetapan" target="_blank">pilkada2017.kpu.go.id/paslon/tahapPenetapan</a></small></h1>
	<hr>
	<table id="table_id" class="display">
    <thead>
        <tr>
        	<th>Pilkada</th>
        	<th>Nomor Urut</th>
            <th>Nama Pasangan</th>
            <th>URL Pasangan</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    	@php
    		$couples = App\Couple::all();
    	@endphp
    	@foreach($couples as $c)
		<tr>
			<td>
				<a href="{{url($c->election->urlname, [], $secure)}}">{{$c->election->place->name}}</a>
			</td>
			<td>
				{{$c->order}}
			</td>
			<td>
				{{$c->candidate->name}} &amp; {{$c->running_mate->name}}
			</td>
			<td>
				<a href="{{url($c->election->urlname."/".$c->order, [], $secure)}}">{{$c->election->place->name}}</a>
			</td>
			<td>
				<button type = "submit"
	    			class = "btn btn-edit btn-xs btn-default"
	    			data-toggle = "modal"
	    			data-target = "#myModal"
	    			data-couple_id = "{{$c->id}}"
	    			data-election_id = "{{$c->election_id}}"
	    			data-order = "{{$c->order}}"
	    			data-candidate_id = "{{$c->candidate_id}}"
	    			data-candidate_name = "{{$c->candidate->name}}"
	    			data-running_mate_id = "{{$c->running_mate_id}}"
	    			data-parties = "{{$c->parties}}"
	    			data-slogan = "{{$c->slogan}}"
	    			data-visi = "{{$c->visi}}"
	    			data-misi = "{{$c->misi}}"
	    			data-program = "{{$c->program}}"
	    			data-website = "{{$c->website}}"
	    			data-sumber = "{{$c->sumber}}"
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
        <h4 class="modal-title" id="myModalLabel">Edit Couple</h4>
      </div>
      <div class="modal-body">
		<form action="{{url('admin/edit-couple', [], $secure)}}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="couple_id">

			<div class="form-group">
				<label>Calon</label>
				<input name="candidate_name" type="text" class="form-control" disabled="" value="">
			</div>

			<div class="form-group">
				<label>Wakil Calon</label><br>
	        	@php
	        		$candidates = App\Candidate::all();
	        	@endphp
	        	<select name="running_mate_id" class="form-control autocomplete">
                @foreach($candidates as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
                </select>
	        </div>

			<div class="form-group">
				<label>Nomor Urut</label>
				<input name="order" type="number" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Di Pemilihan..</label><br>
	        	@php
	        		$elections = App\Election::all();
	        	@endphp
	        	<select name="election_id" class="form-control autocomplete">
                @foreach($elections as $e)
                	@php
		              if($e->place->level == 1)
		                $prefix = "Prov.";
		              if($e->place->level == 2)
		                $prefix = "Kota";
		              if($e->place->level == 3)
		                $prefix = "Kab.";
		            @endphp
                    <option value="{{$e->id}}">{{$prefix}} {{$e->name}}</option>
                @endforeach
                </select>
	        </div>

			@php
                $parties = App\Party::all();
                $parties = $parties->sortBy('abbreviation');
            @endphp
            <div class="form-group">
				<label>Partai</label>
	            <div class="row">
	            	<div class="col-sm-4">
	            		@foreach($parties as $i => $p)
			            	@if($i <= 4)
			        		<div class="checkbox">
			                  <label>
			                    <input  type="checkbox"
			                            value="{{$p->id}}"
			                            name="party[]">
			                    <strong>{{$p->abbreviation}}</strong>
			                  </label>
			                </div>
			                @endif
			            @endforeach
	            	</div>
	            	<div class="col-sm-4">
	            		@foreach($parties as $i => $p)
			            	@if($i > 4 && $i <= 9)
			        		<div class="checkbox">
			                  <label>
			                    <input  type="checkbox"
			                            value="{{$p->id}}"
			                            name="party[]">
			                    <strong>{{$p->abbreviation}}</strong>
			                  </label>
			                </div>
			                @endif
			            @endforeach
	            	</div>
	            	<div class="col-sm-4">
	            		@foreach($parties as $i => $p)
			            	@if($i > 9)
			        		<div class="checkbox">
			                  <label>
			                    <input  type="checkbox"
			                            value="{{$p->id}}"
			                            name="party[]">
			                    <strong>{{$p->abbreviation}}</strong>
			                  </label>
			                </div>
			                @endif
			            @endforeach
	            	</div>
	            </div>
            </div>

			<div class="form-group">
				<label>Website Resmi Kampanye</label>
				<input name="website" type="text" class="form-control">
			</div>

			<div class="form-group">
				<label>Slogan</label>
				<input name="slogan" type="text" class="form-control">
			</div>

			<div class="form-group">
				<label>Visi</label>
				<input name="visi" type="text" class="form-control">
			</div>

			<div class="form-group">
				<label>Misi</label>
				<textarea 	class="form-control"
            				style="width:100%;"
							name="misi"
	            ></textarea>
			</div>

			<div class="form-group">
				<label>Program</label>
				<textarea 	class="form-control"
            				style="width:100%;"
							name="program"
	            ></textarea>
			</div>

			<div class="form-group">
				<label>Sumber Data-Data di Atas</label>
				<textarea 	class="form-control"
            				style="width:100%;"
							name="sumber"
	            ></textarea>
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
	<script type="text/javascript">
        $(document).ready( function () {
            $("select.autocomplete").select2({ width: '100%' });
            $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        });        
    </script>

	<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js', $secure)}}"></script>
	<script type="text/javascript">

		function htmlEncode(value){
		  //create a in-memory div, set it's inner text(which jQuery automatically encodes)
		  //then grab the encoded contents back out.  The div never exists on the page.
		  return $('<div/>').text(value).html();
		}

		$(document).ready( function () {
			$(".btn-edit").click(function(){
				$("#myModal input[name='couple_id']").val($(this).data('couple_id'));
				$("#myModal input[name='candidate_name']").val($(this).data('candidate_name'));
				$("#myModal select[name='running_mate_id']").val($(this).data('running_mate_id')).trigger("change"); 
				$("#myModal select[name='election_id']").val($(this).data('election_id')).trigger("change");
				$("#myModal input[name='order']").val($(this).data('order'));
				
				$("#myModal input[name='party[]']").prop("checked", false);
				var parties = $(this).data('parties');
				for (i = 0; i < parties.length; i++) { 
					$("#myModal input[name='party[]'][value='"+parties[i].id+"']").prop("checked", true);
				}

				$("#myModal input[name='website']").val($(this).data('website'));
				$("#myModal input[name='slogan']").val($(this).data('slogan'));
				$("#myModal input[name='visi']").val($(this).data('visi'));

				var editorObj = $("#myModal textarea[name='misi']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('misi'));

				var editorObj = $("#myModal textarea[name='program']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('program'));

				var editorObj = $("#myModal textarea[name='sumber']").data('wysihtml5');
				var editor = editorObj.editor;
				editor.setValue($(this).data('sumber'));

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