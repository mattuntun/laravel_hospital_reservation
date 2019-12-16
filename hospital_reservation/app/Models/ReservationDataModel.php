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

    //患者データとの外部接続
    //public static function ForeignPatientData(){
        //var_dump('aaaaaaaa');
        //$ForeignPatients = new ReservationDataModel;
        //return $ForeignPatients->belongsTo('App\Models\PatientDataModel');//->where('pt_id',$search_pt_id)->get();
        //var_dump($ForeignPatients);
        //return $ForeignPatients;
        
    //}

    public function ForeignPatientData(){
        //$ForeignPatient = new ReservationDataModel;
        //$ForeignPatient->belongsTo('App\Models\PatientDataModel');
        //return $ForeignPatient;
        return $this->belongsTo('App\Models\PatientDataModel','No');
    }
}
