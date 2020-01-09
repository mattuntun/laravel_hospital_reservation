<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;


class AfterNextCalendar
{
    private $html;  
   
    //翌々月カレンダー
    public function showMonthAfterNextCalendarTag($search_pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue){

        //1日の予約数のパーセンテージを計算・表示形式指定
        function AfterNextMouthDayPossible($search_Department,$year_after_next,$month_after_next,$month_after_next_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue){
            
            //年月日のデータを作成
            $targetDate = strval($year_after_next).strval($month_after_next).strval(str_pad($month_after_next_day, 2, 0, STR_PAD_LEFT));

            //現在の予約済数を獲得
            $reservedNumber = ClinicalDepartmentsDataModel::ForeignReservation($search_Department,$targetDate);
            //1日の予約空き状況を計算
            $emptyParcent = ClinicalDepartmentsDataModel::OneDayCalculation($search_Department,$reservedNumber);

            switch($emptyParcent){
                case($emptyParcent > $doubleCircleReservationValue):
                    return '&#9678';      // ◎ 
                break;
                
                case($emptyParcent > $circleReservationValue):
                    return  '&#9675';     // 〇
                break;

                case($emptyParcent > $triangleReservationValue):
                    return  '&#9651';     // △
                break;

                default:
                    return  '&#10005';    // ✕
                }
            
        }


        //カレンダー本体　翌々月の設定
        $year = date("Y");
        $month = date("m");
        $today = date("d");
        $after_next = strtotime('+2 month',mktime(0, 0, 0, $month, 1, $year));
        $year_after_next = date("Y",$after_next);
        $month_after_next = date("m",$after_next);
        $month_after_next_firstWeekDay = date("w",$after_next);
        $month_after_next_lastday = date("t", $after_next);
        $month_after_next_day =  1 - $month_after_next_firstWeekDay;

//テーブルのhtml
$this->html = <<< EOS
<h1>{$year_after_next}年{$month_after_next}月</h1>
<table align="center" valign="middle" class="table table-bordered" style="background: white;">
<tr align="center" valign="middle">
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
        while ($month_after_next_day <= $month_after_next_lastday) {
            $this->html .= "<tr align='center' valign='middle'>";
            // 各週を描画するHTMLソースを生成する
            for ($i = 0; $i < 7; $i++) {
                if ($month_after_next_day <= 0 || $month_after_next_day > $month_after_next_lastday) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                } elseif($i ==0 || $i ==6 ){
                    $this->html .="<td style = color:#E9E9E9;>". $month_after_next_day . "</td>";

                } elseif (AfterNextMouthDayPossible($search_Department,$year_after_next,$month_after_next,$month_after_next_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue) == '&#10005'){
                    $this->html .="<td style = color:#E9E9E9;>". $month_after_next_day."
                    <br>".AfterNextMouthDayPossible($search_Department,$year_after_next,$month_after_next,$month_after_next_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue)."</td>";
                
                } else {                    
                    $this->html .="<td>
                    <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                    <input type='hidden' name='target_day' value='".$month_after_next_day."'>
                    <input type='hidden' name='target_month' value='".$month_after_next."'>
                    <input type='hidden' name='target_year' value='".$year_after_next."'>
                    <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                    <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                    .$month_after_next_day."
                   <br>".AfterNextMouthDayPossible($search_Department,$year_after_next,$month_after_next,$month_after_next_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue)."</button></td>"; 
                }
                $month_after_next_day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }

}
 
                
?>