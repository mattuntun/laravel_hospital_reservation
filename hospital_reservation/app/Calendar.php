<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\holiday;
use App\Models\AllDepartmentHoliday;

class Calendar
{
    private $html;  

    
    //1日の予約数のパーセンテージを計算・表示形式指定
    public static function DayPossible($search_Department, $year, $month, $day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue){

        
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

    //診療科別の休診日を獲得
    public static function getDepartmentHolidayData($search_Department, $year, $month, $day) {

        //年月日のデータを作成
        $targetDate = strval($year).strval($month).strval(str_pad($day, 2, 0, STR_PAD_LEFT ) );
                        
        //日付指定で休日データを取得
        $horlidayDatas = holiday::GetTargetDateHolidaysDatas($search_Department, $targetDate);
        
        return $horlidayDatas;                
    }

    //全診療科の休診日を獲得
    public static function getAllDepartmentHolidayData($year, $month, $day) {

        //年月日のデータを作成
        $targetDate = strval($year).strval($month).strval(str_pad($day, 2, 0, STR_PAD_LEFT ) );
                        
        //日付指定で休日データを取得
        $AllDepartmentHorlidayDatas = AllDepartmentHoliday::GetAllDepartmentTargetHolidays($targetDate);
        
        return $AllDepartmentHorlidayDatas;                
    }
    
    
    //当月のカレンダー
    public function showCalendarTag($search_pt_id, $search_Department, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue) {

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
<table align="center" valign="middle" class="table table-bordered"  style="background: white;">
<tr align="center" valign="middle" >
  <th align="center" valign="middle" style="background: #AEC4E5; color:red; scope="col">日</th>
  <th align="center" valign="middle" style="background: #AEC4E5; scope="col">月</th>
  <th align="center" valign="middle" style="background: #AEC4E5; scope="col">火</th>
  <th align="center" valign="middle" style="background: #AEC4E5; scope="col">水</th>
  <th align="center" valign="middle" style="background: #AEC4E5; scope="col">木</th>
  <th align="center" valign="middle" style="background: #AEC4E5; scope="col">金</th>
  <th align="center" valign="middle" style="background: #AEC4E5; color:blue;scope="col">土</th>
</tr>
EOS;
        // カレンダーの日付部分を生成する
        while ($day <= $lastDay) {
            $this->html .= "<tr align='center' valign='middle' >";
            // 各週を描画するHTMLソースを生成する $iは曜日 0:日曜日 6土曜日
            for ($i = 0; $i < 7; $i++) {
                if ($day <= 0 || $day > $lastDay) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                
                } elseif ($i ==0  ) {  //隔週の休診日を追加する場合は "|| $i ==6"等を足す
                    $this->html .="<td align='center' valign='middle' style = color:#E9E9E9;>". $day . "</td>";

                // 今日より＋１日まではボタンクリック不可
                } elseif ($day < $today+1) {
                    $this->html .="<td align='center' valign='middle' style = color:#E9E9E9;>". $day . "</td>";

                //予約表示が✕の時クリック不可
                } elseif (Calendar::DayPossible($search_Department, $year, $month, $day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue) == '&#10005') {
                    $this->html .="<td align='center' valign='middle' style = color:#E9E9E9;>". $day ."
                    <br>".Calendar::DayPossible($search_Department, $year, $month, $day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue)."</td>";

                //診療科別・全診療科休日DBに値があれば休診日表示
                } elseif (($getHoliday = Calendar::getDepartmentHolidayData($search_Department, $year, $month, $day) != null) || ($getAllDepartmentHoliday = Calendar::getAllDepartmentHolidayData($year, $month, $day) != null)){
                    $this->html .="<td align='center' valign='middle' style = color:#E9E9E9;>". $day . "<br>休診日</td>";
                
                //通常表記(ボタンクリック可)
                } else {
                   $this->html .="<td align='center' valign='middle'>
                   <button type='submit' class='btn btn-lg btn-block' style='background: white;' onclick='location.href=/mypage/schedule_add_new_my_data_reservation>
                   <input type='hidden' name='target_day' value='".$day."'>
                   <input type='hidden' name='target_month' value='".$month."'>
                   <input type='hidden' name='target_year' value='".$year."'>
                   <input type='hidden' name='search_pt_id' value = '".$search_pt_id."'>
                   <input type='hidden' name='search_Department' value = '".$search_Department."'>"
                   .$day."
                   <br>".Calendar::DayPossible($search_Department, $year, $month,$day, $doubleCircleReservationValue, $circleReservationValue, $triangleReservationValue)."</button></td>"; 
                }
               $day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= '</table>';
    }

}
 
                
?>

