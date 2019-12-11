<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationDataModel extends Model
{
    protected $tables = 'reservation_data';
    protected $guarded = array('No');

    //予約情報の取得
    public static function SearchReservation($search_pt_id){
        $reservationDatas = DB::table('reservation_data')->where('pt_id' ,$search_pt_id)->get();
        return $reservationDatas;
    }

    //患者データとの外部接続
    public function ForeignPatientData($search_pt_id){
        return $this->hasMany('app\Models\PatientDataModel','pt_id','No')->where('pt_id',$search_pt_id)->get();
    }
  
    
}
