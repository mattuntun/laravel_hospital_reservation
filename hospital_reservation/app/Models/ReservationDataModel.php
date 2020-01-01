<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationDataModel extends Model{

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

    //予約情報の新規登録(患者マイページからの登録)
    public static function AppReservationDatas($search_pt_id,$search_department,$reserveDate,$reserveTime){
        $reservationDatas = new ReservationDataModel;
        $reservationDatas->reservation_date = $reserveDate;
        $reservationDatas->reservation_time = $reserveTime;
        $reservationDatas->pt_id = $search_pt_id ;
        $reservationDatas->reservation_department = $search_department;
        $reservationDatas->letter_of_introduction = 2;
        $reservationDatas->introduction_hp  = '紹介状の提出はありません';
        $reservationDatas->introduction_hp_tell  = '090-9999-9999';
        $reservationDatas->introduction_hp_date  = '19700101';
        $reservationDatas->save();

    }

    //予約情報の紹介状の情報追加
    public static function AppIntroduceDatas($pt_id,$hp_name,$hp_tell,$lastDate){

        $reservationDatas = new ReservationDataModel;
        $reservationDatas = ReservationDataModel::where('pt_id',$pt_id)->orderBy('created_at', 'desc')->first();
        $reservationDatas->letter_of_introduction = '1';
        $reservationDatas->introduction_hp  = $hp_name;
        $reservationDatas->introduction_hp_tell  = $hp_tell;
        $reservationDatas->introduction_hp_date  = $lastDate;
        $reservationDatas->save();

        return $reservationDatas;
        }

    //テーブルの診療予約の削除
    public static function DeleteReservationData($reservationNo){
        $deleteReservation = DB::table('reservation_data')->where('No',$reservationNo)->delete();
        return $deleteReservation;

    }
}
