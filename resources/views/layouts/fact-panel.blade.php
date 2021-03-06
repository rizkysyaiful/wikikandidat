<div class="panel panel-default" >
  <div class="panel-body" style="background-color: {{$color}};">
  <?php
    $type_id = App\Type::where('name', $category)->first()->id;
    $facts = $candidate->facts->where('type_id', $type_id)->sortByDesc('date_finish');
    $first = "first";
  ?>
  <span class="glyphicon glyphicon-plus pull-right" 
  data-toggle="modal"
  data-target="#SubmitFactModal"
  data-candidate="{{$candidate->id}}"
  data-nickname="{{$candidate->nickname}}" data-fact-type-name="{{$category}}"
  data-fact-type="{{$type_id}}"
  aria-hidden="true"></span> 
  <h5>{{$category}}:</h5>
  @foreach($facts as $i => $f)
  <div class="data {{$first}}">
    <?php $first = ""; ?>
    <span class="corner-btn label label-primary pull-right" data-toggle="modal" data-target="#modal-{{$f->id}}">
      riwayat
    </span>&nbsp;
    <span class="corner-btn label label-primary pull-right" 
    data-toggle="modal"
    data-target="#EditFactModal-{{$f->id}}">edit</span>
    <span class="corner-date">
      <strong>{{Helper::wk_date($f->date_start, $f->date_finish)}}</strong></span><br>
      {!!markdown($f->text)!!}
  </div>
  @endforeach
  </div>
</div>