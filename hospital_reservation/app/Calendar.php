<?php

namespace App;

class Calendar
{
    private $html;  
    private $button;
    //当月のカレンダー
    public function showCalendarTag()
    {
        //当月の設定
        $year = date("Y");
        $month = date("m");
        $today = date("d");
        $firstWeekDay = date("w", mktime(0, 0, 0, $month, 1, $year)); // 1日の曜日(0:日曜日、6:土曜日)
        $lastDay = date("t", mktime(0, 0, 0, $month, 1, $year)); // 指定した月の最終日
        // 日曜日からカレンダーを表示するため前月の余った日付をループの初期値にする
        $day = 1 - $firstWeekDay;
        //テーブルのhtml
        $this->html = <<< EOS
<h1>{$year}年{$month}月</h1>
<table class="table table-bordered" style="background: white;">
<tr>
  <th style="background: #AEC4E5; color:red; scope="col">日</th>
  <th style="background: #AEC4E5; scope="col">月</th>
  <th style="background: #AEC4E5; scope="col">火</th>
  <th style="background: #AEC4E5; scope="col">水</th>
  <th style="background: #AEC4E5; scope="col">木</th>
  <th style="background: #AEC4E5; scope="col">金</th>
  <th style="background: #AEC4E5; color:blue;scope="col">土</th>
</tr>
EOS;
        // カレンダーの日付部分を生成する
        while ($day <= $lastDay) {
            $this->html .= "<tr>";
            // 各週を描画するHTMLソースを生成する
            for ($i = 0; $i < 7; $i++) {
                if ($day <= 0 || $day > $lastDay) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                } elseif($i ==0 || $i ==6 ){
                    $this->html .="<td style = color:#E9E9E9;>". $day . "</td>";
                //}elseif ($day < $today+1){
                //    $this->html .="<td style = color:#E9E9E9;>". $day . "</td>";
                } else {
                   $this->html .="<td>
                   <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                   <input type='hidden' name='target_day' value='".$day."'>
                   <input type='hidden' name='target_month' value='".$month."'>
                   <input type='hidden' name='target_year' value='".$year."'>"
                   .$day."</button></td>"; 
                }
               $day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }
    
    //翌月カレンダー
    public function showNextMonthCalendarTag(){
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
        //ボタンのHTML
        $this->button = <<< EOF
<td><button type="submit" class="btn btn-lg btn-block" style="background: white;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">
EOF;
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
                    $this->html .=$this->button.$next_month_day.'</button></td>'; 
                }
                $next_month_day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }
    
    
    //翌々月カレンダー
    public function showMonthAfterNextCalendarTag(){
        //翌々月の設定
        $year = date("Y");
        $month = date("m");
        $today = date("d");
        $aster_next = strtotime('+2 month',mktime(0, 0, 0, $month, 1, $year));
        $year_after_next_ = date("Y",$aster_next);
        $month_after_next = date("m",$aster_next);
        $month_after_next_firstWeekDay = date("w",$aster_next);
        $month_after_next_lastday = date("t", $aster_next);
        $month_after_next_day =  1 - $month_after_next_firstWeekDay;
//テーブルのhtml
$this->html = <<< EOS
<h1>{$year_after_next_}年{$month_after_next}月</h1>
<table class="table table-bordered" style="background: white;">
<tr>
<th style="background: #AEC4E5; color:red; scope="col">日</th>
<th style="background: #AEC4E5; scope="col">月</th>
<th style="background: #AEC4E5; scope="col">火</th>
<th style="background: #AEC4E5; scope="col">水</th>
<th style="background: #AEC4E5; scope="col">木</th>
<th style="background: #AEC4E5; scope="col">金</th>
<th style="background: #AEC4E5; color:blue;scope="col">土</th>
</tr>
EOS;
        //ボタンのHTML
        $this->button = <<< EOF
<td><button type="submit" class="btn btn-lg btn-block" style="background: white;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">
EOF;
        // カレンダーの日付部分を生成する
        while ($month_after_next_day <= $month_after_next_lastday) {
            $this->html .= "<tr>";
            // 各週を描画するHTMLソースを生成する
            for ($i = 0; $i < 7; $i++) {
                if ($month_after_next_day <= 0 || $month_after_next_day > $month_after_next_lastday) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                } elseif($i ==0 || $i ==6 ){
                    $this->html .="<td style = color:#E9E9E9;>". $month_after_next_day . "</td>";
                }  else {                    
                    $this->html .=$this->button.$month_after_next_day.'</button></td>';
                }
                $month_after_next_day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }
}
 
                
?>