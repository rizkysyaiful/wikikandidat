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
        // TODO, refactor ini jadi global function, hapus juga yang di verification page
        function flexible_date($db_date)
        {
          $date = (int)substr($db_date, 8, 10);
          $month = (int)substr($db_date, 5, -3);
          $year = (int)substr($db_date, 0, 4);
          $month_opt = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
          $output = "";
          $output = $date != 0 ? $date." " : "";
          $output .= $month != 0 ? $month_opt[$month-1]." " : "";
          $output .= $year != 0 ? $year : "";
          return $output;
        }
        
      ?>
    <span class="corner-date">
      <?php
        $start = flexible_date($f->date_start);
        $finish = flexible_date($f->date_finish);
      ?>
      <strong>{{($start != "" ? $start." - " : "")}}{{$finish}}</strong></span><br>
    {!!markdown($f->text)!!}
  </div>
  @endforeach
  </div>
</div>