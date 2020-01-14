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


    //テーブル本体　ユニックスタイムで30分は1800 29分は1740
        for($schedule = $startTime; $schedule < $finishTime; $schedule =$schedule+1800){
            $time_value = 'H:i';//dateの表示形式設定
            $schedule_start = date($time_value,$breakTime_Start);//開院時間をユニックス⇒時間表示
            $schedule_finish = date($time_value,$break_Finish);//閉院時間をユニックス⇒時間表示
            $schedule_time = date($time_value,$schedule);//一コマあたりの時間をユニックス⇒時間表示
            $belongTime = date($time_value,$schedule+1740);//一コマあたりの時間範囲をユニックス⇒時間表示


                //休憩開始時間の時の休憩表示設定
                if( $schedule == $breakTime_Start){
                    $this->table.="<tr align='center'>
                                    <td colspan='2' style = 'font-size:20px; color:#E9E9E9;'>
                                    {$schedule_start}&#126;{$schedule_finish}は休診です
                                    </td>
                                </tr>";
                
                }
                //休憩時間範囲をコンテニュー
                if( ($schedule >= $breakTime_Start) && ($schedule < $break_Finish) ){
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
                                
                                /*
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
                                    */
                                if ( $parcents > $doubleCircleReservationValue ) {
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9678;</td>";   // ◎

                                } elseif ( $parcents > $circleReservationValue ) {
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9675;</td>";   // 〇

                                } elseif ($parcents > $triangleReservationValue) {
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9651;</td>";   // △ 

                                } else {
                                    $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#10005;</td>";    // ✕

                                }

                            }

        }//テーブル本体を構成するforのカッコ

        return $this->table .= '</tr></table>';

    }

}


?>

