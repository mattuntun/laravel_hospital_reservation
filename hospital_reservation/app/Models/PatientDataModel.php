<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PatientDataModel extends Model
{
    protected $table = 'pt_data';
    protected $guarded = array('No');

    //患者情報の取得
    public static function getPtData($search_pt_id){
        $ptData = DB::table('pt_data')->where('pt_id',$search_pt_id)->get();
        return $ptData;
    }

    //予約情報との外部接続
    public function ForeignReservationData(){
        return $this->belongsTo('APP\Models\ReservationModel');
    }

    //テーブル患者情報入力
    public static function AddNewPtData($request){
        $newPtAdd = new PatientDataModel;
        $newPtAdd->pt_id = $request->input('pt_id');
        $newPtAdd->pt_last_name = $request->input('pt_last_name');
        $newPtAdd->pt_name = $request->input('pt_name');
        $newPtAdd->pt_last_name_kata = $request->input('pt_last_name_kata');
        $newPtAdd->pt_name_kata = $request->input('pt_name_kata');
        $newPtAdd->birthday = $request->input('birthday');
        $newPtAdd->email_adress = $request->input('email_adress');
        $newPtAdd->sex = $request->input('sex');
        $newPtAdd->save();
    }
 
}



