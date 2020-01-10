<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;

class Schedule
{
    private $table;

    public function MakeSchedule($search_Department
                                ,$targetDate
                                ,$search_pt_id){

    //診療科モデルから指定した診療科情報を取得
    $departmentDatas = ClinicalDepartmentsDataModel::GetIndividualDepartmentdatas($search_Department);

    $open = $departmentDatas->start_time; //開院時間取得
    $break_s = $departmentDatas->break_time_start; //休憩開始時間取得
    $break_f = $departmentDatas->break_time_close; //休憩終了時間取得
    $close = $departmentDatas->close_time; //閉院時間取得
    $day = $targetDate;

    $startTime = strtotime($day.$open); //開院時間をユニックスタイムへ変換
    $finishTime = strtotime($day.$close); //閉院時間をユニックスタイムへ変換
    $breakTime_Start = strtotime($day.$break_s); //休憩開始時間をユニックスタイムへ変換
    $break_Finish = strtotime($day.$break_f); //休憩終了時間をユニックスタイムへ変換

    //◎、〇、△の条件を呼び出し
    $doubleCircleReservationValue = 60;
    $circleReservationValue = 30;
    $triangleReservationValue = 0;


    //テーブルのhtmlを作成
$this->table = <<<EOF
<table class="table table-bordered" align="center" style="background: white;" >
    <tr>
        <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">タイムテーブル</th>
        <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px; scope="col">予約状況</th>
    </tr>
EOF;


    //テーブル本体　ユニックスタイムで30分は1800
    for($schdule = $startTime; $schdule < $finishTime; $schdule =$schdule+1800){
        $time_value = 'H:i';//dateの表示形式設定
        $schedule_start = date($time_value,$breakTime_Start);//開院時間をユニックス⇒時間表示
        $schedule_finish = date($time_value,$break_Finish);//閉院時間をユニックス⇒時間表示
        $schedule_time = date($time_value,$schdule);//一コマあたりの時間をユニックス⇒時間表示
        $belongTime = date($time_value,$schdule+1760);//一コマあたりの時間範囲をユニックス⇒時間表示


            //休憩開始時間の時の休憩表示設定
            if( $schdule == $breakTime_Start){
                $this->table.="<tr align='center'>
                                <td colspan='2' style = 'font-size:20px;'>
                                {$schedule_start}&#126;{$schedule_finish}は、休診です
                                </td>
                            </tr>";
            
            }
            //休憩時間範囲をコンテニュー
            if( ($schdule >= $breakTime_Start) && ($schdule < $break_Finish) ){
                continue;
            }

            //診療科モデルから空き容量と％を呼び出し
            $OclocNumberOfReservations=ClinicalDepartmentsDataModel::OclockForeignReservation($search_Department,$targetDate,$schedule_time);
            $parcents =  ClinicalDepartmentsDataModel::Calculation($search_Department,$OclocNumberOfReservations);

        //開院時間をforで繰り返し
        $this->table.="<tr align='center'>";
                            
                            if($parcents <= $triangleReservationValue){

            $this->table.= "<td style = 'color:#E9E9E9;'>
                                {$schedule_time}&#126;{$belongTime}
                            </td>
                            <td style = 'color:#E9E9E9;'>
                                {$parcents}%完成時に消す</br>&#10005;
                            </td>";

                            }else{

            $this->table.="<td><button type='submit'
                                class='btn btn-lg btn-block'
                                style='background: white;
                                font-size:30px;
                                text-align:center;'
                                onclick='location.href=/mypage/complete_add_new_reservation>

                                    <input type='hidden' value = '{$schedule_time}' name = 'targetTime'>
                                    <input type='hidden' value = {$search_Department} name = 'clinical_department'>
                                    <input type='hidden' value = {$targetDate} name = 'targetDate'>
                                    <input type='hidden' value = {$search_pt_id} name = 'search_pt_id'>

                                    {$schedule_time}&#126;{$belongTime}

                                </button>
                            </td>";
                            
                            switch($parcents){
                                case($parcents > $doubleCircleReservationValue):
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9678;</td>";   // ◎
                                    break;

                                case($parcents > $circleReservationValue):
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9675;</td>";   // 〇
                                    break;
                                    
                                case($parcents > $triangleReservationValue):
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9651;</td>";   // △ 
                                    break;

                                default:
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#10005;</td>";    // ✕
                                }
                            }

    }
    return $this->table .= '</tr></table>';


/*


$this->table2 = <<<EOD
<table class="table table-bordered" align="center" style="background: white;" >
    <tr>
        <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">タイムテーブル</th>
        <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px; scope="col">予約状況</th>
    </tr>
EOD;
    //開院時と閉院時の設定(分は考えない)
    $open_hour = substr($departmentDatas->start_time, 0, -6); //開院時間を整数へ
    $close_hour = substr($departmentDatas->close_time, 0, -6); //閉院時間を整数へ
    $break_start_hour = substr($departmentDatas->break_time_start, 0, -6); //休憩開始を整数
    $break_finish_hour = substr($departmentDatas->break_time_close, 0, -6); //休憩終了を整数

    $break_start = substr($departmentDatas->break_time_start, 0, -3); //休憩開始を時間表示
    $break_finish = substr($departmentDatas->break_time_close, 0, -3); //休憩開始を時間表示

    //◎、〇、△の条件を呼び出し
    $doubleCircleReservationValue = 60;
    $circleReservationValue = 30;
    $triangleReservationValue = 0;


            //テーブル本体/◎表示に関しては診療科モデルを利用
            for($hour = $open_hour; $hour < $close_hour; $hour++){
                for($min = 0; $min < 60; $min=$min+30){
                    $openTime = $hour.":".sprintf('%02d', $min);
                    $belongMin =  $min+29;
                    $belongTime = $hour.":".$belongMin;
                    $this->table2.="<tr>
                                        <td align='center'>";
                                        //休憩時間の表示設定
                                    if( ($hour >= $break_start_hour) && ($hour < $break_finish_hour)){     
                                        $this->table.="{$openTime}&#126;は休診時間</td>
                                        <td align='center'>予約不可</td>";
                                        
                                        continue 2;
                                       
                                        }else{
 
                                $this->table2.="<button type='submit'
                                                class='btn btn-lg btn-block'
                                                style='background: white;
                                                font-size:30px;
                                                text-align:center;'
                                                onclick='location.href=/mypage/complete_add_new_reservation>
                                            <input type='hidden' value = '$openTime' name = 'targetTime'>
                                            <input type='hidden' value ='$search_Department' name = 'clinical_department'>
                                            <input type='hidden' value ='$targetDate' name = 'targetDate'>
                                            <input type='hidden' value ='$search_pt_id' name = 'search_pt_id'>".
                                            $openTime."&#126;".$belongTime.
                                            "</button>
                                        </td>
                                        <td style='background: white; font-size:30px; text-align:center;'>";
                                            $OclocNumberOfReservations=ClinicalDepartmentsDataModel::OclockForeignReservation($search_Department,$targetDate,$openTime);
                                            $parcents =  ClinicalDepartmentsDataModel::Calculation($search_Department,$OclocNumberOfReservations);
                            $this->table2.= $parcents;
                            
                                    switch($parcents){
                                        case($parcents > $doubleCircleReservationValue):
                                            $this->table2.="&#9678;";   // ◎
                                            break;
                                        case($parcents > $circleReservationValue):
                                            $this->table2.="&#9675;";   // 〇
                                            break;
                                        case($parcents > $triangleReservationValue):
                                            $this->table2.="&#9651;";   // △ 
                                            break;
                                        default:
                                            $this->table2.="&#10005;";    // ✕
                                        }
                            $this->table2.="</td>
                                    </tr>";
                                         } //ifのカッコ
                }//for　$minのカッコ    
            }//for　$hourのカッコ

        return $this->table2 .= '</table>'; */

    }//このMakeScheduleメソッド全体のカッコ
}


?>

