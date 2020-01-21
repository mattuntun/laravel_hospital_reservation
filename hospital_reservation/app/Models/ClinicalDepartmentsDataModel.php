<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClinicalDepartmentsDataModel extends Model
{
    protected $table = 'clinical_departments';
    protected $primaryKey ='No';
    protected $guarded = array('No');

    //このテーブル全ての情報を取得するメソッド
    public static function GetDepartmentsData(){
         $getDepartments = DB::table('clinical_departments')->get();
        return $getDepartments;
    }

    //全ての診療科の診療時間等の変更を行うメソッド
    public static function AllTimeChenge($changeTimes){
        $newTimes = ClinicalDepartmentsDataModel::all();
        foreach($newTimes as $newTime){
            $newTime->start_time = $changeTimes['open_time'];
            $newTime->close_time = $changeTimes['close_time'];
            $newTime->break_time_start = $changeTimes['restStart_time'];
            $newTime->break_time_close = $changeTimes['restStop_time'];

            $newTime->half_open_week = $changeTimes['half_week_day'];
            $newTime->half_open_start = $changeTimes['half_open_time'];
            $newTime->half_open_close = $changeTimes['half_close_time'];


            $newTime->save();    
        }
    }

    //全ての診療科の予約可能人数の変更を行うメソッド
    public static function ChangePossibleNumber($possible){
        $changePossibleNumbers = ClinicalDepartmentsDataModel::all();
        foreach($changePossibleNumbers as $changePossibleNumber){
            $changePossibleNumber->possible_peoples  = $possible;
            $changePossibleNumber->save();
        }
    }

    //全ての診療科の空き容量％の変更を行うメソッド
    public static function AllCapacitySet($capacity_parcent){
        $newAllCapacitys = ClinicalDepartmentsDataModel::all();
        foreach($newAllCapacitys as $newAllCapacity){
            $newAllCapacity->more_than_enough_capacity  = $capacity_parcent['doubleCircle'];
            $newAllCapacity->enough_capacity = $capacity_parcent['circle'];
            $newAllCapacity->not_enough_capacity = $capacity_parcent['triangle'];
            $newAllCapacity->save();    
        }
    }

    //個別診療科新規追加を行うメソッド
    public static function AddNewDepartment($addData){
        $addNewDepartment = new ClinicalDepartmentsDataModel;
        $addNewDepartment->clinical_department = $addData['new_department'];
        $addNewDepartment->possible_peoples = $addData['possible_people'];
        $addNewDepartment->start_time = $addData['open_time'];
        $addNewDepartment->close_time = $addData['close_time'];
        $addNewDepartment->break_time_start = $addData['restStart_time'];
        $addNewDepartment->break_time_close = $addData['restStop_time'];
        $addNewDepartment->more_than_enough_capacity = $addData['more_than_enough_capacity'];
        $addNewDepartment->enough_capacity = $addData['enough_capacity'];
        $addNewDepartment->not_enough_capacity = $addData['not_enough_capacity'];
        $addNewDepartment->half_open_week = $addData['half_week_day'];
        $addNewDepartment->half_open_start = $addData['half_open_time'];
        $addNewDepartment->half_open_close = $addData['half_close_time'];
        $addNewDepartment->save();
    }

    //個別半日診療データの抜出を行うメソッド
    public static function GetHalfWeekData($search_Department){
        $get_half_week_data = ClinicalDepartmentsDataModel::where('clinical_department',$search_Department)->first();
        $half_week_day_point = $get_half_week_data->half_open_week;
        return $half_week_day_point;
    }

    //診療科削除のメソッド
    public static function DeleteDepartment($deleteValue){
        $delete_department = DB::table('clinical_departments')->where('clinical_department',$deleteValue)->delete();
    }

    //診療科個別に情報を取得するメソッド
    public static function GetIndividualDepartmentdatas($department){
        $get_datas = ClinicalDepartmentsDataModel::where('clinical_department',$department)->first();
        return $get_datas;
    }

    //診療科別の開院時間等、診療科設定変更メソッド
    public static function IndividualChangeDepartment($changeTimes){
        //var_dump($changeTimes['search_change_deparment']);

        $IndividualChanges = ClinicalDepartmentsDataModel::where('clinical_department',$changeTimes['search_change_deparment'])->get();
        foreach($IndividualChanges as $IndividualChange){
            $IndividualChange->start_time = $changeTimes['open_time'];
            $IndividualChange->close_time = $changeTimes['close_time'];
            $IndividualChange->break_time_start = $changeTimes['restStart_time'];
            $IndividualChange->break_time_close = $changeTimes['restStop_time'];
            $IndividualChange->half_open_week = $changeTimes['half_week_day'];
            $IndividualChange->half_open_start = $changeTimes['half_open_time'];
            $IndividualChange->half_open_close = $changeTimes['half_close_time'];
            $IndividualChange->save();
        }
    }

    //診療科別の予約可能人数の変更を行うメソッド
    public static function ChangeIndividualPossibleNumber($search_individual_department,$possible_number){

        $getDepartmentDatas = ClinicalDepartmentsDataModel::where('clinical_department',$search_individual_department)->first();
        $getDepartmentDatas->possible_peoples = $possible_number;
        $getDepartmentDatas->save();
    }
    
    //診療科別の空き容量％の変更を行うメソッド
    public static function ChangeCapacitySet($search_individual_department,$capacity_parcent){
        $getDepartmentDatas = ClinicalDepartmentsDataModel::where('clinical_department',$search_individual_department)->first();
        $getDepartmentDatas->more_than_enough_capacity = $capacity_parcent['doubleCircle'];
        $getDepartmentDatas->enough_capacity = $capacity_parcent['circle'];
        $getDepartmentDatas->not_enough_capacity = $capacity_parcent['triangle'];
        $getDepartmentDatas->save();
    }


    //予約可能数の抽出
    public static function PossiblePeople($search_department){
        $departmentReseravationMax = DB::table('clinical_departments')->where('clinical_department',$search_department)->first('possible_peoples');
        return $departmentReseravationMax;
    }

    //予約表示条件を呼び出し(◎、〇、△のパーセント条件呼び出し)
    public static function GetCapacityDatas($search_Department){
        $getCapacityDatas = ClinicalDepartmentsDataModel::where('clinical_department',$search_Department)->first();
        
        //◎を取り出し
        $doubleCircleReservationValue = $getCapacityDatas->more_than_enough_capacity;

        //〇を取り出し
        $circleReservationValue = $getCapacityDatas->enough_capacity;

        //△を取り出し
        $triangleReservationValue = $getCapacityDatas->not_enough_capacity;

        //◎等の情報を配列へ変換
        $capacityDatas = [];
        $capacityDatas ['doubleCircleReservationValue'] = $doubleCircleReservationValue;
        $capacityDatas ['circleReservationValue'] = $circleReservationValue;
        $capacityDatas ['triangleReservationValue'] = $triangleReservationValue;
        
        return $capacityDatas;
   
    }

    //空予約数　パーセントの計算(1コマの計算)
    public static function Calculation($search_department,$numberOfReservation){
        //フィールド値設定
        $num =$numberOfReservation;//予約数
                
        //一コマあたりの最大数を抽出
        $maxValue = ClinicalDepartmentsDataModel::PossiblePeople($search_department);
        $intMaxValue = $maxValue->possible_peoples;
        
        //予約状況パーセント処理
        $par = ($num / $intMaxValue) * 100;  //分母の100は要変更
        $parcent = floor($par); // 切捨て整数化

        //空き状況のパーセント処理
        $possibleParcent = 100 - $parcent;
        
        return $possibleParcent;
    }

    //1日の予約可能枠を抽出　1コマの予約可能数を抽出し、ユニックスタイムを利用してコマ数を取得
    public static function OneDayPossibleFrame($department,$targetDate){
        //診療科情報を取得
        $departmentData = ClinicalDepartmentsDataModel::GetIndividualDepartmentdatas($department);
        $open = $departmentData->start_time; //開院時間取得
        $break_s = $departmentData->break_time_start; //休憩開始時間取得
        $break_f = $departmentData->break_time_close; //休憩終了時間取得
        $close = $departmentData->close_time; //閉院時間取得
        $day = $targetDate;

        $startTime = strtotime($day.$open); //開院時間をユニックスタイムへ変換
        $finishTime = strtotime($day.$close); //閉院時間をユニックスタイムへ変換
        $breakTime_Start = strtotime($day.$break_s); //休憩開始時間をユニックスタイムへ変換
        $break_Finish = strtotime($day.$break_f); //休憩終了時間をユニックスタイムへ変換
        
        //開院時間と休憩開始時間をユニックスで引き算(ユニックスタイムで30分は1800)
        if($breakTime_Start == null){
            $AmPm_frame_Value = ($finishTime - $startTime)/1800;
            return $AmPm_frame_Value;
        }else{
            $AM_value = ($breakTime_Start - $startTime)/1800;
            $PM_value = ($finishTime - $break_Finish)/1800;
            $AmPm_frame_Value = $AM_value + $PM_value;
            return $AmPm_frame_Value;
        }
    }

    //空予約数　パーセントの計算(1日の計算)
    public static function OneDayCalculation($search_department,$numberOfReservation,$oneDayMaxFrame){
        //フィールド値設定
        $num =$numberOfReservation;//予約数
                
        //一コマあたりの最大数を抽出
        $maxValue = ClinicalDepartmentsDataModel::PossiblePeople($search_department);
        $intMaxValue = $maxValue->possible_peoples ;   //1コマあたりの可能予約数抽出
        $oneDayMax = $intMaxValue * $oneDayMaxFrame;   //1日あたりの可能予約数抽出
        
        //予約状況パーセント処理
        $par = ($num / $oneDayMax) * 100;  
        $parcent = floor($par); // 切捨て整数化

        //空き状況のパーセント処理
        $possibleParcent = 100 - $parcent;
        
        return $possibleParcent;
    }

    //診療科モデル⇒予約モデルのリレーション(日付指定でリレーション)
    public static function ForeignReservationData($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->get();
        return $foreignReservationDepartment;

    }

    //診療科モデル⇒予約モデル⇒患者モデル　にて患者情報を取得(予約モデルを経由して患者モデル取得)
    public static function ForeignPatientData($searchdepartment,$targetDate){
        $foreignPatientData = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->join('pt_data','reservation_data.pt_id',
                                                    '=',
                                                    'pt_data.pt_id')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->get();
        return $foreignPatientData;

    }


    //1日の予約数を得る為のリレーション⇒予約数獲得
    public static function ForeignReservation($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }
    //一コマ単位の予約数を得る為のリレーション⇒予約数獲得
    public static function OclockForeignReservation($searchdepartment,$targetDate,$schedulTime){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time',$schedulTime)
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }


  
    
}


