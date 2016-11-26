<?php

namespace App\Helpers;

class Helper
{
    public static function wk_date($start, $finish)
    {
      $date_s = (int)substr($start, 8, 10);
      $month_s = (int)substr($start, 5, -3);
      $year_s = (int)substr($start, 0, 4);
      if($finish != null)
      {
        $date_f = (int)substr($finish, 8, 10);
        $month_f = (int)substr($finish, 5, -3);
        $year_f = (int)substr($finish, 0, 4);  
      }
      $month_opt = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
      $output = "";
      $output = $date_s != 0 ? $date_s." " : "";
      $output .= $month_s != 0 ? $month_opt[$month_s-1]." " : "";
      $output .= $year_s != 0 ? $year_s : "";
      if($finish != null)
      {
        if($output != "")
        {
          $output .= " - ";
        }
        $output .= $date_f != 0 ? $date_f." " : "";
        $output .= $month_f != 0 ? $month_opt[$month_f-1]." " : "";
        $output .= $year_f != 0 ? $year_f : "";
      }
      return $output;
    }
}
