<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class holiday extends Model
{
    protected $table = 'holidays';
    protected $primaryKey ='id';
    protected $guarded = array('id');

    //休日データを取得
    public static function GetHolidaysDatas($search_individual_department){

        $get_datas = DB::table('holidays')->where('clinical_department',$search_individual_department)->get();
        return $get_datas;
    }

    //日にちを限定して休日データを取得
    public static function GetTargetDateHolidaysDatas($search_individual_department,$targetDate){

    $get_datas = DB::table('holidays')
                            ->where('clinical_department',$search_individual_department)
                            ->where('holiday_date',$targetDate)
                            ->first();
    return $get_datas;
}

    //休日データを追加
    public static function AddHoliday($add_datas){
        $add_holiday = new holiday;

        //指定の日付をDBから探す
        $target_date =$add_holiday->where('holiday_date',$add_datas['check_Date'])->first(); 
    
        //もしDBにtarget_dateがあったら
        if($target_date == null){
            $add_holiday->clinical_department = $add_datas['search_individual_department'];
            $add_holiday->holiday_date = $add_datas['check_Date'];
            $add_holiday->description = $add_datas['holiday_reason'];
            $add_holiday->save();  //新規登録

        //もしDBにtarget_dateがなかったら
        }else{
            $target_date->description = $add_datas['holiday_reason'];
            $target_date->save();  //休診理由を更新
        }
    }

    //診療科削除のメソッド
    public static function DeleteHoliday($deleteId){
        $delete_department = DB::table('holidays')->where('id',$deleteId)->delete();
    }



}
