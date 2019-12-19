<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationDataModel extends Model
{
    protected $table = 'reservation_data';
    protected $primaryKey ='No';
    protected $guarded = array('No');

    //予約情報の取得(患者IDから全てを取得)
    public static function SearchReservation($search_pt_id){
        $reservationDatas = DB::table('reservation_data')->where('pt_id',$search_pt_id)->get();
        return $reservationDatas;
    }
    
    //予約情報の取得(予約Noから個別で取得)
    public static function SearchReservationSeparate($resNo){
        $reservationDatas = DB::table('reservation_data')->where('No',$resNo)->get();
        return $reservationDatas;
    }

    //予約情報テーブルの主キー取得
    //public static function MainKey($search_pt_id){
    //    $mainKeys = DB::table('reservation_data')->where('pt_id',$search_pt_id)->get('No');
    //    return $mainKeys;
    //}

    //患者情報との外部接続(リレーション)
    public function ForeignPatientData(){
        return $this->belongsTo('App\Models\PatientDataModel','No');
    }

    //テーブルの診療予約の削除
    public static function DeleteReservationData($reservationNo){
        $deleteReservation = DB::table('reservation_data')->where('No',$reservationNo)->delete();
        return $deleteReservation;

    }
}
