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

//テーブルのhtmlを作成
$this->table = <<<EOF
<table class="table table-bordered" align="center" style="background: white;" >
    <tr>
        <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">タイムテーブル</th>
        <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px; scope="col">予約状況</th>
    </tr>
EOF;
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
                    $this->table.="<tr>
                                        <td align='center'>";
                                        //休憩時間の表示設定
                                    if( ($hour >= $break_start_hour) && ($hour < $break_finish_hour)){     
                                        $this->table.="{$openTime}&#126;は休診時間</td>
                                        <td align='center'>予約不可</td>";
                                        
                                        continue 2;
                                       
                                        }else{
 
                                $this->table.="<button type='submit'
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
                            $this->table.= $parcents;
                            
                                    switch($parcents){
                                        case($parcents > $doubleCircleReservationValue):
                                            $this->table.="&#9678;";   // ◎
                                            break;
                                        case($parcents > $circleReservationValue):
                                            $this->table.="&#9675;";   // 〇
                                            break;
                                        case($parcents > $triangleReservationValue):
                                            $this->table.="&#9651;";   // △ 
                                            break;
                                        default:
                                            $this->table.="&#10005;";    // ✕
                                        }
                            $this->table.="</td>
                                    </tr>";
                                         } //ifのカッコ
                }//for　$minのカッコ    
            }//for　$hourのカッコ

        return $this->table .= '</table>';
    }
}


?>

