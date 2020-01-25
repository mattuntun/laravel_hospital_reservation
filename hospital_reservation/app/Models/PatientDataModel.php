<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PatientDataModel extends Model
{
    protected $table = 'pt_data';
    protected $primaryKey ='No';
    protected $guarded = array('No');

    //患者情報一括ダウンロードビューページで使用
    public static function AllPtData() {
        $all_pt_data = DB::table('pt_data')
                            ->orderBy('pt_id', 'asc')                    
                            ->paginate(10);
        return $all_pt_data;
    }

    //患者情報一括ダウンロードビューページで使用
    public static function AllPtDataDownLoad() {
        //exportで使用するため、エクセルに吐き出す順番としてもselectの調整で調整
        $all_pt_data = DB::table('pt_data')
                            ->orderBy('pt_id', 'asc')
                            ->select('pt_data.pt_id',
                            'pt_data.pt_last_name',
                            'pt_data.pt_name',
                            'pt_data.pt_last_name_kata',
                            'pt_data.pt_name_kata',
                            'pt_data.sex',
                            'pt_data.birthday',
                            'pt_data.email_adress')
                            ->get();
        return $all_pt_data;
    }

    //予約情報との外部接続
    //public function ForeignReservationData(){
    //    return $this->hasMany('App\Models\ReservationDataModel','No');
    //}

    //クエリビルダjoinでリレーション
    public static function ForeignReservationData($serach_pt_id) {
        $ForeignPtData = \DB::table('pt_data')
                              ->where('pt_data.pt_id',$serach_pt_id)
                                ->join('reservation_data','pt_data.pt_id','=','reservation_data.pt_id')
                                ->get();
        //var_dump($ForeignPtData);
        return $ForeignPtData;
    }

    //患者情報の取得
    public static function getPtData($search_pt_id){
        $ptData = DB::table('pt_data')->where('pt_id',$search_pt_id)->get();
        return $ptData;
    }
    //患者情報テーブルの主キーの抽出
    public static function Mainkey($search_pt_id){
        $main = DB::table('pt_data')->where('pt_id',$search_pt_id)->first('No');
        return $main; 
    }
    

    //テーブル患者情報入力
    public static function AddNewPtData($request) {
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

    //テーブル患者情報変更
    public static function ChangePtData($request) {
        $ChangePts = new PatientDataModel;
        $ChangePts = PatientDataModel::where('pt_id',$request->search_pt_id)->first();
        $ChangePts->pt_last_name = $request->change_pt_last_name;
        $ChangePts->pt_name = $request->change_pt_name;
        $ChangePts->pt_last_name_kata = $request->change_pt_last_name_kata;
        $ChangePts->pt_name_kata = $request->change_pt_name_kata;
        $ChangePts->save();
    }


    //テーブル患者情報削除
    public static function DeletePatientData($search_pt_id) {
        $deletePt = DB::table('pt_data')->where('pt_id',$search_pt_id)->delete();
        return $deletePt;

    }
 
}



