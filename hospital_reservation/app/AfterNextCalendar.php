<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\holiday;
use App\Models\AllDepartmentHoliday;

class AfterNextCalendar
{
    private $html;  

    
    //1日の予約数のパーセンテージを計算・表示形式指定
    public static function AfterNextMonthDayPossible($search_Department, $year_after_next, $month_after_next, $month_after_next_day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue){
        
        //年月日のデータを作成
        $targetDate = strval($year_after_next).strval($month_after_next).strval(str_pad($month_after_next_day, 2, 0, STR_PAD_LEFT));

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

    //診療科別の休診日を獲得
    public static function getDepartmentAfterNextMonthHolidayData($search_Department, $year_after_next, $month_after_next, $month_after_next_day){

        //年月日のデータを作成
        $after_next_targetDate = strval($year_after_next).strval($month_after_next).strval(str_pad($month_after_next_day, 2, 0, STR_PAD_LEFT));
        
        //日付指定で休日データを取得
        $after_next_horlidayDatas = holiday::GetTargetDateHolidaysDatas($search_Department, $after_next_targetDate);
        
        return $after_next_horlidayDatas;                
    }

    //全診療科の休診日を獲得
    public static function getAllDepartmentAfterNextMonthHolidayData( $year_after_next, $month_after_next, $month_after_next_day){

        //年月日のデータを作成
        $after_next_targetDate = strval($year_after_next).strval($month_after_next).strval(str_pad($month_after_next_day, 2, 0, STR_PAD_LEFT));
        
        //日付指定で休日データを取得
        $AfterNextAllDepartmentHorlidayDatas = AllDepartmentHoliday::GetAllDepartmentTargetHolidays($after_next_targetDate);
        
        return $AfterNextAllDepartmentHorlidayDatas;                
    }    
   
    //翌々月カレンダー
    public function showMonthAfterNextCalendarTag($search_pt_id, $search_Department, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue) {

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
            // 各週を描画するHTMLソースを生成する$iは曜日 0:日曜日 6土曜日
            for ($i = 0; $i < 7; $i++) {

                if ($month_after_next_day <= 0 || $month_after_next_day > $month_after_next_lastday) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                } elseif($i == 0 ){   //隔週の休診日を追加する場合は "|| $i ==6"等を足す
                    $this->html .="<td style = color:#E9E9E9;>". $month_after_next_day . "</td>";

                //予約表示が✕の時クリック不可
                } elseif (AfterNextCalendar::AfterNextMonthDayPossible($search_Department, $year_after_next, $month_after_next, $month_after_next_day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue) == '&#10005'){
                    $this->html .="<td style = color:#E9E9E9;>". $month_after_next_day."
                    <br>".AfterNextCalendar::AfterNextMonthDayPossible($search_Department, $year_after_next, $month_after_next, $month_after_next_day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue)."</td>";

                //診療科別・全診療科休日DBに値があれば休診日表示
                } elseif (($get_after_next_Holiday = AfterNextCalendar::getDepartmentAfterNextMonthHolidayData($search_Department, $year_after_next, $month_after_next, $month_after_next_day) != null) || ($getAfterNextAllDepartmentHoliday = AfterNextCalendar::getAllDepartmentAfterNextMonthHolidayData($year_after_next, $month_after_next, $month_after_next_day) != null)) {
                    $this->html .="<td align='center' valign='middle' style = color:#E9E9E9;>". $month_after_next_day . "<br>休診日</td>";
                
                //通常表記(ボタンクリック可)
                } else {                    
                    $this->html .="<td>
                    <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                    <input type='hidden' name='target_day' value='".$month_after_next_day."'>
                    <input type='hidden' name='target_month' value='".$month_after_next."'>
                    <input type='hidden' name='target_year' value='".$year_after_next."'>
                    <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                    <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                    .$month_after_next_day."
                   <br>".AfterNextCalendar::AfterNextMonthDayPossible($search_Department, $year_after_next, $month_after_next, $month_after_next_day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue)."</button></td>"; 
                }
                $month_after_next_day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }

}
 
                
?>