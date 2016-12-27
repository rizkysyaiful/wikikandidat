<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
Home 
@endsection

@section('head')
<style type="text/css">
    .media{
        margin-top: 5px;
    }
    select.date{
        display: inline
    }
    ol,ul{
        padding-left: 17px;
    }
    hr{
        border-top:2px solid #909090;
    }
</style>
@endsection

@section('content')
<div class="container reading">
    <h1>Tugas Verifikasi</h1>
<!--    <div class="btn-group btn-group-lg" role="group" aria-label="...">
      <button type="button" class="btn btn-default">Antrian Verifikasi</button>
      <button type="button" class="btn btn-default">Middle</button>
      <button type="button" class="btn btn-default">Right</button>
    </div>
-->
    @if(Auth::user()->is_verifier)
    <?php
      $jobs = App\Submission::where([
            ['first_verifier_id', '=', Auth::user()->id],
        ])->orderBy('created_at', 'desc')->get();
    ?>
    @each('loops.verify-fact-sub', $jobs, 's')
    <?php
      $jobs = App\Submission::where([
            ['second_verifier_id', '=', Auth::user()->id],
            ['first_verifier_id', '=', null],
        ])->orderBy('created_at', 'desc')->get();
    ?>
    @each('loops.verify-fact-sub', $jobs, 's')
    <?php
      $jobs = App\Submission::where([
            ['third_verifier_id', '=', Auth::user()->id],
            ['second_verifier_id', '=', null],
        ])->orderBy('created_at', 'desc')->get();
    ?>
    @each('loops.verify-fact-sub', $jobs, 's')
    @endif

</div>
@endsection

@section('js')
    <script src="{{asset('js/showdown.min.js', $secure)}}"></script>
    <script src="{{asset('js/donetyping.js', $secure)}}"></script>
    <script src="{{asset('js/jashkenas/underscore-min.js', $secure)}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var converter = new showdown.Converter();
            $(".markdown-input").donetyping(function(){
                $("#preview-"+$(this).data("s-id")).html(converter.makeHtml($(this).val()));
            });

            $(".checkbox-range").click(function(){
                var id = $(this).data("s-id");
                $("#date_s_select-"+id).toggle("fast").val("0");
                $("#date_s-"+id).text("");
                $("#month_s_select-"+id).toggle("fast").val("0");
                $("#month_s-"+id).text("");
                $("#year_s_select-"+id).toggle("fast").val("0000");
                $("#year_s-"+id).text("");
                $("#up_until-"+$(this).data("s-id")).toggle("fast");
            });

            $(".checkbox-is-changed").click(function(){
                var id = $(this).data("s-id");
                if( $(this).prop('checked') ){
                    $(".edit-"+id).prop("disabled", true);
                }else{
                    $(".edit-"+id).prop("disabled", false);
                }
            });

            $("select.date").on('change', function(){
                var value = $(this).val();
                var text = $(this).val();
                if($(this).attr("name") == "month_s" || $(this).attr("name") == "month_f")
                {
                    month = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
                    text = month[parseInt(value) - 1];
                }
                if($(this).attr("name") == "year_s")
                {
                    text += " - ";
                    if(value == "0000")
                    {
                        text = "";
                    }  
                }
                if($(this).attr("name") == "year_f" && value == "0000"){
                    text = "";
                }
                if( ($(this).attr("name") == "month_s" && value == "0") || ($(this).attr("name") == "month_f" && value == "0"))
                {
                    text = "";
                }
                if( ($(this).attr("name") == "date_s" && value == "0") || ($(this).attr("name") == "date_f" && value == "0"))
                {
                    text = "";
                }
                $("#"+$(this).attr("name")+"-"+$(this).data("s-id")).text( text );
            });
        });
    </script>
@endsection
