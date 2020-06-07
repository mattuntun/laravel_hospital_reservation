<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;

class HospitalCalendar
{
    private $html;  

    
    //1日の予約数のパーセンテージを計算・表示形式指定
    public static function DayPossible($search_Department,$year,$month,$day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue){
        
        //年月日のデータを作成
        $targetDate = strval($year).strval($month).strval(str_pad($day, 2, 0, STR_PAD_LEFT));

        //1日の最大予約枠数を計算
        $oneDayMaxFrame = ClinicalDepartmentsDataModel::OneDayPossibleFrame($search_Department,$targetDate);

        //現在の予約済数を獲得
        $reservedNumber = ClinicalDepartmentsDataModel::ForeignReservation($search_Department,$targetDate);

        //1日の予約空き状況を計算
        $emptyParcent = ClinicalDepartmentsDataModel::OneDayCalculation($search_Department,$reservedNumber,$oneDayMaxFrame);


        if ( $emptyParcent > $doubleCircleReservationValue ) {
        
            return '&#9678';      // ◎

        } elseif ( $emptyParcent > $circleReservationValue ) {

            return  '&#9675';     // 〇

        } elseif ( $emptyParcent > $triangleReservationValue ) {

            return  '&#9651';     // △

        } else {

            return  '&#10005';    // ✕

        }
        
    }  
    
    
    //当月のカレンダー
    public function showCalendarTag($search_pt_id, $search_Department, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue)
    {

        //カレンダー本体　当月の設定
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
<table align="center" valign="middle" class="table table-bordered" style="background: white;">
<tr align="center" valign="middle">
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
            $this->html .= "<tr align='center' valign='middle'>";
            // 各週を描画するHTMLソースを生成する $iは曜日 0:日曜日 6土曜日
            for ($i = 0; $i < 7; $i++) {
                if ($day <= 0 || $day > $lastDay) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                
                } elseif ($i == 0 ) {   //隔週の休診日を追加する場合は "|| $i ==6"等を足す
                    $this->html .="<td style = color:#E9E9E9;>". $day . "</td>";
                
                } elseif ($day < $today) {
                    $this->html .="<td style = color:#E9E9E9;>". $day . "</td>";
                
                } else {
                    $this->html .="<td>
                    <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/edit_patient_appoimtment_information/select_time_reservation>
                    <input type='hidden' name='target_day' value='".$day."'>
                    <input type='hidden' name='target_month' value='".$month."'>
                    <input type='hidden' name='target_year' value='".$year."'>
                    <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                    <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                    .$day."
                    <br>".HospitalCalendar::DayPossible($search_Department, $year, $month,$day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue)."
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