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
  data-nickname="{{$candidate->nickname}}" data-fact-type-name="{{$name}}"
  data-fact-type="{{$type_id}}"
  aria-hidden="true"></span> 
  <h5>{{$name}}:</h5>
  @foreach($facts as $i => $f)
  <div class="data {{$first}}">
    <?php $first = ""; ?>
    <span class="corner-btn label label-primary pull-right" data-toggle="modal" data-target="#modal-{{$f->id}}">
      riwayat
    </span>&nbsp;
    <span class="corner-btn label label-primary pull-right" 
    data-toggle="modal"
    data-target="#EditFactModal-{{$f->id}}">edit</span>
    <?php 
        $date_s = (int)substr($f->date_start, 8, 10);
        $month_s = (int)substr($f->date_start, 5, -3);
        $year_s = (int)substr($f->date_start, 0, 4);
        $date_f = (int)substr($f->date_finish, 8, 10);
        $month_f = (int)substr($f->date_finish, 5, -3);
        $year_f = (int)substr($f->date_finish, 0, 4);
        // TODO, bikin atau cari function convert to tiga huruf bulan 
      ?>
    <span class="corner-date"><strong>
      {{$date_s != 0 ? $date_s." " : "" }}{{ $month_s != 0 ? $month_s." " : "" }}{{$year_s != 0 ? $year_s." - " : ""}}{{$date_f != 0 ? $date_f." " : "" }}{{ $month_f != 0 ? $month_f." " : "" }}{{$year_f != 0 ? $year_f : ""}}</strong></span><br>
    {!!markdown($f->text)!!}
  </div>
  @endforeach
  </div>
</div>