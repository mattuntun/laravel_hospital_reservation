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

    //休日データを追加
    public static function AddHoliday($add_datas){
        $add_holiday = new holiday;
        $add_holiday->clinical_department = $add_datas['search_individual_department'];
        $add_holiday->holiday_date = $add_datas['check_Date'];
        $add_holiday->description = $add_datas['holiday_reason'];
        $add_holiday->save();
    }

    //診療科削除のメソッド
    public static function DeleteHoliday($deleteId){
        $delete_department = DB::table('holidays')->where('id',$deleteId)->delete();
    }



}
