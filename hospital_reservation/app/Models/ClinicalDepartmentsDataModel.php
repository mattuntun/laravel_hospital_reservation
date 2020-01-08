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

    
}


