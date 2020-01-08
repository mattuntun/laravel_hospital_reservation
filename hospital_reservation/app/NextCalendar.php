<?php

namespace App;

class NextCalendar
{
    private $html;  
   
    //翌月カレンダー
    public function showNextMonthCalendarTag($search_pt_id,$search_Department){
        // 翌月の設定
        $year = date("Y");
        $month = date("m");
        $today = date("d");
        $next = strtotime('+1 month',mktime(0, 0, 0, $month, 1, $year));
        $next_year = date("Y",$next);
        $next_month = date("m",$next);
        $next_month_firstWeekDay = date("w",$next);
        $next_month_lastDay = date("t", $next);
        $next_month_day =  1 - $next_month_firstWeekDay;

//テーブルのhtml
$this->html = <<< EOS
<h1>{$next_year}年{$next_month}月</h1>
<table class="table table-bordered" style="background: white;">
<tr>
<th style="background: #AEC4E5; color:red;" scope="col">日</th>
<th style="background: #AEC4E5;" scope="col">月</th>
<th style="background: #AEC4E5;" scope="col">火</th>
<th style="background: #AEC4E5;" scope="col">水</th>
<th style="background: #AEC4E5;" scope="col">木</th>
<th style="background: #AEC4E5;" scope="col">金</th>
<th style="background: #AEC4E5; color:blue;" scope="col">土</th>
</tr>
EOS;

        // カレンダーの日付部分を生成する
        while ($next_month_day <= $next_month_lastDay) {
            $this->html .= "<tr>";
            // 各週を描画するHTMLソースを生成する
            for ($i = 0; $i < 7; $i++) {
                if ($next_month_day <= 0 || $next_month_day > $next_month_lastDay) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                } elseif($i ==0 || $i ==6 ){
                    $this->html .="<td style = color:#E9E9E9;>". $next_month_day . "</td>";
                }  else {                    
                    $this->html .="<td>
                    <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                    <input type='hidden' name='target_day' value='".$next_month_day."'>
                    <input type='hidden' name='target_month' value='".$next_month."'>
                    <input type='hidden' name='target_year' value='".$next_year."'>
                    <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                   <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                    .$next_month_day."</button></td>"; 
                }
                $next_month_day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }

}
 
                
?>