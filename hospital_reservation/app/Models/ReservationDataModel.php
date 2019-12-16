<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationDataModel extends Model
{
    protected $table = 'reservation_data';
    protected $primaryKey ='No';
    protected $guarded = array('No');

    //予約情報の取得
    public static function SearchReservation($search_pt_id){
        $reservationDatas = DB::table('reservation_data')->where('pt_id' ,$search_pt_id)->get();
        return $reservationDatas;
    }

    public function ForeignPatientData(){
        return $this->belongsTo('App\Models\PatientDataModel','No');
    }
}
