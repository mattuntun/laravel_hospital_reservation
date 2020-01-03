<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;

class Calendar
{
    private $html;  
    
    //当月のカレンダー
    public function showCalendarTag($search_pt_id,$search_Department)
    {


        //1日の予約数のパーセンテージを計算
        function DayPossible($search_Department,$year,$month,$day){
            
            //年月日のデータを作成
            $targetDate = strval($year).strval($month).strval(str_pad($day, 2, 0, STR_PAD_LEFT));

            //現在の予約済数を獲得
            $reservedNumber = ClinicalDepartmentsDataModel::ForeignReservation($search_Department,$targetDate);
            //1日の予約空き状況を計算
            $emptyParcent = ClinicalDepartmentsDataModel::OneDayCalculation($search_Department,$reservedNumber);

            return $emptyParcent;
     }
     

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
                }elseif ($day < $today+1){
                    $this->html .="<td style = color:#E9E9E9;>". $day . "</td>";
                } else {
                   $this->html .="<td>
                   <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                   <input type='hidden' name='target_day' value='".$day."'>
                   <input type='hidden' name='target_month' value='".$month."'>
                   <input type='hidden' name='target_year' value='".$year."'>
                   <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                   <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                   .$day."
                   <br>".DayPossible($search_Department,$year,$month,$day)."
                   </button></td>"; 
                }
               $day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }

}
 
                
?>