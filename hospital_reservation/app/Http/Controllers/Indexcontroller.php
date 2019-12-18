<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;
use App\Models\ReservationDataModel;

class Indexcontroller extends Controller
{
    public function Index(){
        return view('index');
    }

    public function MyPageMenu(Request $request){
        
        //患者情報モデルから患者情報取得
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);
        //var_dump($request->search_pt_id);
        
        //予約情報テーブルの主キーを取得
        //$foreignGetMainKeys = ReservationDataModel::MainKey($request->search_pt_id);

        //var_dump($foreignGetMainKeys);

        //foreach($foreignGetMainKeys as $foreignGetMainKey){
        //    foreach($foreignGetMainKey as $No){
        //        $mainKey[] = $No;
        //        }
        //}
        //var_dump($mainKey);

        //予約情報主ｷｰを利用して患者情報ﾃｰﾌﾞﾙから予約情報をﾘﾚｰｼｮﾝ
        //$foreignReservationDatas = PatientDataModel::find(1,'No')->ForeignReservationData()->get();
        //foreach($foreignReservationDatas as $foreignReservationData){
        //    var_dump($foreignReservationData);
        //}
        
        //joinでリレーション
        //$foreignReservationDatas = \DB::table('pt_data')
        //                                ->where('pt_data.pt_id',$request->search_pt_id)
        //                                ->join('reservation_data','pt_data.pt_id','=','reservation_data.pt_id')
        //                                ->get();


        //モデルのjoinを利用
        $foreignReservationDatas =\App\Models\PatientDataModel::ForeignReservationData($request->search_pt_id);

        //foreach($foreignReservationDatas as $foreignReservationData){
        //    var_dump($foreignReservationData);
        //}
        if($foreignReservationDatas != null){
            return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas,'foreignReservationDatas'=>$foreignReservationDatas]);
        }else{
            return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas,'foreignReservationDatas'=>null]);
        }
    }

    public function HospitalMenu(){
        return view('hospital_menu.hospital_menu');
    }
//,'foreignReservationDatas'=>$foreignReservationDatas

}
