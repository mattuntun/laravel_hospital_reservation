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

    //個別診療科新規追加を行うメソッド
    public static function AddNewDepartment($addData){
        $addNewDepartment = new ClinicalDepartmentsDataModel;
        $addNewDepartment->clinical_department = $addData['new_department'];
        $addNewDepartment->possible_peoples = $addData['possible_people'];
        $addNewDepartment->start_time = $addData['open_time'];
        $addNewDepartment->close_time = $addData['close_time'];
        $addNewDepartment->break_time_start = $addData['restStart_time'];
        $addNewDepartment->break_time_close = $addData['restStop_time'];
        $addNewDepartment->save();
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

    //診療科別の診療科設定変更メソッド
    public static function IndividualChangeDepartment($changeTimes){
        //var_dump($changeTimes['search_change_deparment']);

        $IndividualChanges = ClinicalDepartmentsDataModel::where('clinical_department',$changeTimes['search_change_deparment'])->get();
        foreach($IndividualChanges as $IndividualChange){
            $IndividualChange->start_time = $changeTimes['open_time'];
            $IndividualChange->close_time = $changeTimes['close_time'];
            $IndividualChange->break_time_start = $changeTimes['restStart_time'];
            $IndividualChange->break_time_close = $changeTimes['restStop_time'];
            $IndividualChange->save();
        }

    }

    //予約可能数の抽出
    public static function PossiblePeople($search_department){
        $departmentReseravationMax = DB::table('clinical_departments')->where('clinical_department',$search_department)->first('possible_peoples');
        return $departmentReseravationMax;
    }

    //空予約数　パーセントの計算
    public static function Calculation($search_department,$numberOfReservation){
        //フィールド値設定
        $num =$numberOfReservation;    //予約数(仮)
        
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

    //予約数を得る為のリレーション⇒予約数獲得
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

    public static function OclockForeignReservation09($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','09:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation10($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','10:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation11($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','11:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation12($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','12:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation13($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','13:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation14($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','14:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation15($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','15:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation16($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','16:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation17($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','17:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

    public static function OclockForeignReservation18($searchdepartment,$targetDate){
        $foreignReservationDepartment = DB::table('clinical_departments')
                                            ->where('clinical_departments.clinical_department',$searchdepartment)
                                            ->join('reservation_data','clinical_departments.clinical_department',
                                                    '=',
                                                    'reservation_data.reservation_department')
                                            ->where('reservation_data.reservation_date',$targetDate)
                                            ->where('reservation_data.reservation_time','18:00:00')
                                            ->get()
                                            ->count();
       return $foreignReservationDepartment;

    }

  
    
}


