<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationDataModel extends Model{

    protected $table = 'reservation_data';
    protected $primaryKey ='No';
    protected $guarded = array('No');

    //予約情報の取得(患者IDから全てを取得)
    public static function SearchReservation($search_pt_id) {
        $reservationDatas = DB::table('reservation_data')->where('pt_id',$search_pt_id)->get();
        return $reservationDatas;
    }
    
    //予約情報の取得(予約Noから個別で取得)
    public static function SearchReservationSeparate($resNo) {
        $reservationDatas = DB::table('reservation_data')->where('No',$resNo)->get();
        return $reservationDatas;
    }

    //予約情報の取得(日付から全取得)
    public static function SearchReservationFromDate($target_date) {
        $reservationDatas = DB::table('reservation_data')->where('reservation_date',$target_date)->get();
        return $reservationDatas;
    }

    //クエリビルダで患者モデルとリレーション
    public static function ForeignPatientsDatas($search_pt_id) {
        $foreignPatientsDatas = DB::table('reservation_data')
                                        ->where('reservation_data.pt_id',$search_pt_id)
                                        ->join('pt_data','reservation_data.pt_id','=','pt_data.pt_id') 
                                        ->get();
        return $foreignPatientsDatas;
    }

    
    //全ての患者予約と患者情報取得(予約エクスポートビューで使用)
    public static function ForeignAllPatientsDatas() {
        //joinした際に、患者モデルでのNoカラムをviewする際に優先してしまうためselect使用
        $foreignPatientsDatas = DB::table('reservation_data')
                                        ->join('pt_data','reservation_data.pt_id','=','pt_data.pt_id')
                                        ->select(
                                        'reservation_data.No',                      //予約No
                                        'reservation_data.reservation_department',  //診療科名
                                        'reservation_data.pt_id',                   //患者ID
                                        'pt_data.pt_last_name',                     //患者姓
                                        'pt_data.pt_name',                          //患者名
                                        'pt_data.birthday',                         //患者生年月日
                                        'reservation_data.reservation_date',        //予約日
                                        'reservation_data.reservation_time',        //予約時間
                                        'letter_of_introduction',                   //紹介状有無
                                        'reservation_data.introduction_hp',         //紹介元病院
                                        'reservation_data.introduction_hp_tell',    //紹介元病院TEL
                                        'reservation_data.introduction_hp_date',    //紹介元受診日
                                        'reservation_data.created_at',              //作成日
                                        'reservation_data.updated_at',              //更新日
                                        )
                                        ->distinct()
                                        ->orderBy('reservation_date', 'desc')
                                        ->orderBy('reservation_time', 'asc')
                                        ->orderBy('reservation_department', 'asc')
                                        ->paginate(10);
                                        
        return $foreignPatientsDatas;
    }

    //全ての患者予約と患者情報取得(予約エクスポートで使用)
    public static function ForeignAllPatientsDatasForExcel() {
        //joinした際に、患者モデルでのNoカラムをviewする際に優先してしまうためselect使用
        //exportで使用するため、エクセルに吐き出す順番としてもselectの調整で調整
        $foreignPatientsDatas = DB::table('reservation_data')
                                        ->join('pt_data','reservation_data.pt_id','=','pt_data.pt_id')
                                        ->select(
                                        'reservation_data.No',                      //予約No
                                        'reservation_data.reservation_department',  //診療科名
                                        'reservation_data.pt_id',                   //患者ID
                                        'pt_data.pt_last_name',                     //患者姓
                                        'pt_data.pt_name',                          //患者名
                                        'pt_data.birthday',                         //患者生年月日
                                        'reservation_data.reservation_date',        //予約日
                                        'reservation_data.reservation_time',        //予約時間
                                        'letter_of_introduction',                   //紹介状有無
                                        'reservation_data.introduction_hp',         //紹介元病院
                                        'reservation_data.introduction_hp_tell',    //紹介元病院TEL
                                        'reservation_data.introduction_hp_date',    //紹介元受診日
                                        'reservation_data.created_at',              //作成日
                                        'reservation_data.updated_at',              //更新日
                                        )
                                        ->distinct()
                                        ->orderBy('reservation_date', 'desc')
                                        ->orderBy('reservation_time', 'asc')
                                        ->orderBy('reservation_department', 'asc')
                                        ->get();
                                        
        return $foreignPatientsDatas;
    }

    //患者情報インポートの為のデフォルトエクセル取得(予約エクスポートビューで使用)
    public static function DefaultReservationForImportExcel() {
        //joinした際に、患者モデルでのNoカラムをviewする際に優先してしまうためselect使用
        $foreignPatientsDatas = DB::table('reservation_data')
                                        ->distinct()
                                        ->select(
                                            'reservation_data.reservation_date',        //予約日
                                            'reservation_data.reservation_time',        //予約時間
                                            'reservation_data.reservation_department',  //診療科名
                                            'reservation_data.pt_id',                   //患者ID
                                            'letter_of_introduction',                   //紹介状有無
                                            'reservation_data.introduction_hp',         //紹介元病院
                                            'reservation_data.introduction_hp_tell',    //紹介元病院TEL
                                            'reservation_data.introduction_hp_date',    //紹介元受診日
                                            )
                                        ->orderBy('reservation_date', 'desc')
                                        ->orderBy('reservation_time', 'asc')
                                        ->orderBy('reservation_department', 'asc')
                                        ->limit(1)
                                        ->get();
                                        
        return $foreignPatientsDatas;
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
    public static function AppReservationDatas($search_pt_id, $search_department, $reserveDate, $reserveTime){
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
    public static function AppIntroduceDatas($pt_id, $hp_name, $hp_tell, $lastDate) {

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
    public static function DeleteReservationData($reservationNo) {
        $deleteReservation = DB::table('reservation_data')->where('No',$reservationNo)->delete();
        return $deleteReservation;

    }
}
