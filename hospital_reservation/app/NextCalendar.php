<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\holiday;
use App\Models\AllDepartmentHoliday;


class NextCalendar
{
    private $html;  
   
    //翌月カレンダー
    public function showNextMonthCalendarTag($search_pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue){

        //1日の予約数のパーセンテージを計算・表示形式指定
        function NextMouthDayPossible($search_Department,$next_year,$next_month,$next_month_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue){
    
            //年月日のデータを作成
            $targetDate = strval($next_year).strval($next_month).strval(str_pad($next_month_day, 2, 0, STR_PAD_LEFT));

            //1日の最大予約枠数を計算
            $oneDayMaxFrame = ClinicalDepartmentsDataModel::OneDayPossibleFrame($search_Department,$targetDate);

            //現在の予約済数を獲得
            $reservedNumber = ClinicalDepartmentsDataModel::ForeignReservation($search_Department,$targetDate);
            
            //1日の予約空き状況を計算
            $emptyParcent = ClinicalDepartmentsDataModel::OneDayCalculation($search_Department,$reservedNumber,$oneDayMaxFrame);

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
            //診療科別の休診日を獲得
            function getNextMonthDepartmentHolidayData($search_Department, $next_year, $next_month, $next_month_day){

                //年月日のデータを作成
                $next_month_targetDate = strval($next_year).strval($next_month).strval(str_pad($next_month_day, 2, 0, STR_PAD_LEFT));
                
                //日付指定で休日データを取得
                $next_month_horlidayDatas = holiday::GetTargetDateHolidaysDatas($search_Department, $next_month_targetDate);
                
                return $next_month_horlidayDatas;                
            }

            //全診療科の休診日を獲得
            function getNextMonthAllDepartmentHolidayData($next_year, $next_month, $next_month_day){

                //年月日のデータを作成
                $next_month_targetDate = strval($next_year).strval($next_month).strval(str_pad($next_month_day, 2, 0, STR_PAD_LEFT));
                
                //日付指定で休日データを取得
                $NextMonthAllDepartmentHorlidayDatas = AllDepartmentHoliday::GetAllDepartmentTargetHolidays($next_month_targetDate);
                
                return $NextMonthAllDepartmentHorlidayDatas;                
            }


        //カレンダー本体　翌月の設定
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
        while ($next_month_day <= $next_month_lastDay) {
            $this->html .= "<tr td align='center' valign='middle'>";
            // 各週を描画するHTMLソースを生成する
            for ($i = 0; $i < 7; $i++) {
                if ($next_month_day <= 0 || $next_month_day > $next_month_lastDay) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";

                } elseif($i ==0 || $i ==6 ){
                    $this->html .="<td style = color:#E9E9E9;>". $next_month_day . "</td>";
                
                //予約表示が✕の時クリック不可
                } elseif (NextMouthDayPossible($search_Department,$next_year,$next_month,$next_month_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue) == '&#10005'){
                    $this->html .="<td style = color:#E9E9E9;>". $next_month_day ."
                    <br>".NextMouthDayPossible($search_Department,$next_year,$next_month,$next_month_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue)."</td>";  

                //診療科別・全診療科休日DBに値があれば休診日表示
                } elseif (($getNextMonthHoliday = getNextMonthDepartmentHolidayData($search_Department, $next_year,$next_month,$next_month_day) != null) || ($getNextMonthAllDepartmentHoliday = getNextMonthAllDepartmentHolidayData($next_year,$next_month,$next_month_day) != null)){
                    $this->html .="<td align='center' valign='middle' style = color:#E9E9E9;>". $next_month_day . "<br>休診日</td>";

                //通常表記(ボタンクリック可)
                } else {                    
                    $this->html .="<td>
                    <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                    <input type='hidden' name='target_day' value='".$next_month_day."'>
                    <input type='hidden' name='target_month' value='".$next_month."'>
                    <input type='hidden' name='target_year' value='".$next_year."'>
                    <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                   <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                    .$next_month_day."
                   <br>".NextMouthDayPossible($search_Department,$next_year,$next_month,$next_month_day,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue)."</button></td>"; 
                }
                $next_month_day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }

}
 
                
?>