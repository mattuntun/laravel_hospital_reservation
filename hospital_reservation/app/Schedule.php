<?php

namespace App;
use App\Models\ClinicalDepartmentsDataModel;

class Schedule
{
    private $table;

    public function MakeSchedule($search_Department, $targetDate, $half_week_day_point, $search_pt_id) {

    //診療科モデルから指定した診療科情報を取得
    $departmentDatas = ClinicalDepartmentsDataModel::GetIndividualDepartmentdatas($search_Department);

    $open = $departmentDatas->start_time; //開院時間取得
    $break_s = $departmentDatas->break_time_start; //休憩開始時間取得
    $break_f = $departmentDatas->break_time_close; //休憩終了時間取得
    $close = $departmentDatas->close_time; //閉院時間取得
    $day = $targetDate;

    $half_open_start = $departmentDatas->half_open_start;  //半日診療での開院時間
    $half_open_close = $departmentDatas->half_open_close;  //半日診療での閉院時間

    $startTime = strtotime($day.$open); //開院時間をユニックスタイムへ変換
    $finishTime = strtotime($day.$close); //閉院時間をユニックスタイムへ変換
    $breakTime_Start = strtotime($day.$break_s); //休憩開始時間をユニックスタイムへ変換
    $break_Finish = strtotime($day.$break_f); //休憩終了時間をユニックスタイムへ変換
    $half_startTime = strtotime($day.$half_open_start); //半日開院時間をユニックスタイムへ変換
    $half_finishTime = strtotime($day.$half_open_close); //半日開院時間をユニックスタイムへ変換

    //◎、〇、△の条件を呼び出し
    //診療科モデルから空き表示条件を取得
    $getDepartmentDatas = ClinicalDepartmentsDataModel::GetCapacityDatas($search_Department);

    //◎、〇、△の条件を呼び出し
    $doubleCircleReservationValue = $getDepartmentDatas['doubleCircleReservationValue'];  //◎

    $circleReservationValue = $getDepartmentDatas['circleReservationValue'];  //〇

    $triangleReservationValue = $getDepartmentDatas['triangleReservationValue'];  //△

    //指定した日付から曜日を出力
    $target_week = date('w', strtotime($targetDate));

    
    /*半日条件の曜日とカレンダーで指定した日付の曜日が同じではなかった場合
      通常の表示*/
    if( $half_week_day_point != $target_week ) {

    //テーブルのhtmlを作成
    $this->table = <<<EOF
    <table class="table table-bordered" align="center" style="background: white;" >
        <tr>
            <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">タイムテーブル</th>
            <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px; scope="col">予約状況</th>
        </tr>
    EOF;
    
    
        //テーブル本体　ユニックスタイムで30分は1800
            for($schdule = $startTime; $schdule < $finishTime; $schdule =$schdule+1800) {
                $time_value = 'H:i';//dateの表示形式設定
                $schedule_break_start = date($time_value,$breakTime_Start);//休憩時間をユニックス⇒時間表示
                $schedule_break_finish = date($time_value,$break_Finish);//休憩時間をユニックス⇒時間表示
                $schedule_time = date($time_value,$schdule);//一コマあたりの時間をユニックス⇒時間表示
                $belongTime = date($time_value,$schdule+1760);//一コマあたりの時間範囲をユニックス⇒時間表示
    
    
                    //休憩開始時間の時の休憩表示設定
                    if( $schdule == $breakTime_Start) {
                        $this->table.="<tr align='center'>
                                        <td colspan='2' style = 'font-size:20px; color:#E9E9E9;'>
                                        {$schedule_break_start}&#126;{$schedule_break_finish}は休診です
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
                                    //もし％の値が△以下だったらボタンにしない
                                    if($parcents <= $triangleReservationValue){
    
                    $this->table.= "<td style = 'color:#E9E9E9;'>
                                        {$schedule_time}&#126;{$belongTime}
                                    </td>
                                    <td style = 'color:#E9E9E9;'>
                                        {$parcents}%完成時に消す</br>&#10005;
                                    </td>";
    
                                    } else {  //もし％の値が△以上だったらボタンにする
    
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
                                    //%の値によって◎等の表示を変化
                                    if($parcents > $doubleCircleReservationValue) {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9678;</td>";   // ◎
                                    } elseif($parcents > $circleReservationValue) {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9675;</td>";   // 〇
                                    } elseif($parcents > $triangleReservationValue) {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9651;</td>";   // △ 
                                    } else {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#10005;</td>";    // ✕
                                    }

                                }
    
            }//テーブル本体を構成するforのカッコ
    
            return $this->table .= '</tr></table>';
    }//半日ifのカッコ

    /*半日条件の曜日とカレンダーで指定した日付の曜日が同だった場合
      半日表示*/
    else {

    //テーブルのhtmlを作成
    $this->table = <<<EOF
    <h2>ご指定の診療日は半日診療となっています</h2>
    <table class="table table-bordered" align="center" style="background: white;" >
        <tr>
            <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">タイムテーブル</th>
            <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px; scope="col">予約状況</th>
        </tr>
    EOF;
    
        //テーブル本体　ユニックスタイムで30分は1800
            for($schdule = $half_startTime; $schdule < $half_finishTime; $schdule =$schdule+1800) {
                $time_value = 'H:i';//dateの表示形式設定
                $schedule_time = date($time_value,$schdule);//一コマあたりの時間をユニックス⇒時間表示
                $belongTime = date($time_value,$schdule+1760);//一コマあたりの時間範囲をユニックス⇒時間表示

                //診療科モデルから空き容量と％を呼び出し
                $OclocNumberOfReservations=ClinicalDepartmentsDataModel::OclockForeignReservation($search_Department,$targetDate,$schedule_time);
                $parcents =  ClinicalDepartmentsDataModel::Calculation($search_Department,$OclocNumberOfReservations);
    
                //開院時間をforで繰り返し
                $this->table.="<tr align='center'>";

                                    //もし％の値が△以下だったらボタンにしない
                                    if ($parcents <= $triangleReservationValue){
    
                    $this->table.= "<td style = 'color:#E9E9E9;'>
                                        {$schedule_time}&#126;{$belongTime}
                                    </td>
                                    <td style = 'color:#E9E9E9;'>
                                        {$parcents}%完成時に消す</br>&#10005;
                                    </td>";
    
                                    } else {  //もし％の値が△より上だったらボタンにする
    
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
                                    
                                    if($parcents > $doubleCircleReservationValue) {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9678;</td>";   // ◎
                                    } elseif($parcents > $circleReservationValue) {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9675;</td>";   // 〇
                                    } elseif($parcents > $triangleReservationValue) {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#9651;</td>";   // △ 
                                    } else {
                                        $this->table.="<td style = 'font-size:20px;'>{$parcents}%完成時に消す</br>&#10005;</td>";    // ✕
                                    }
                                }

    
            }//テーブル本体を構成するforのカッコ
    
            return $this->table .= '</tr></table>';


    }//半日elseのカッコ

    }

}


?>

