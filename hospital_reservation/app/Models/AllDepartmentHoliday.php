<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllDepartmentHoliday extends Model
{
    protected $table = 'all_department_holidays';

    //全ての休診日データを取得
    public static function GetAllDepartmentHolidays(){
        $AllDepartmentHoliday = DB::table('all_department_holidays')->get();
        return $AllDepartmentHoliday;
    }

    //日付指定で休診日データを取得
    public static function GetAllDepartmentTargetHolidays($target_date){
        //var_dump($target_date);
        $AllDepartmentHolidayDates = DB::table('all_department_holidays')
                                    ->where('holiday_date',$target_date)
                                    ->first();
        //var_dump($AllDepartmentHolidayDates);
        return $AllDepartmentHolidayDates;
    }

    //休診日データをDBへ追加
    public static function AddAllDepartmentTargetHolidays($add_holiday_data){
        
        $all_department_holidays = new AllDepartmentHoliday;
        
        //全ての休日から特定の日付を探す(target_date) 
        $target_date = $all_department_holidays->where('holiday_date',$add_holiday_data)->first();

        //target_dateがDB上に存在しなかったら
        if($target_date == null){
            $all_department_holidays->holiday_date = $add_holiday_data['check_Date'];
            $all_department_holidays->description = $add_holiday_data['holiday_reason'];
            $all_department_holidays->save();  //新規作成

        //target_dateがDB上に存在したら
        }else{
            $target_date->description = $add_holiday_data['holiday_reason'];
            $target_date->save();  //休診理由を更新変更
        }
    }

    //診療科削除のメソッド
    public static function DeleteAllDepartmentHoliday($deleteId){
        $delete_department = DB::table('all_department_holidays')->where('id',$deleteId)->delete();
    }

}
