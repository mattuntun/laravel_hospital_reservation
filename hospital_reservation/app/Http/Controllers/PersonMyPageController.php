<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDataModel;
use App\Models\PatientDataModel;

class PersonMyPageController extends Controller
{   
    
    //患者マイページから予約削除ページへのアクション
    public function DeleteMyReservations(Request $request){
        
        //患者IDから患者テーブル主キー獲得
        $ptNo = PatientDataModel::Mainkey($request->search_reservation_pt_id);
        
        //予約情報から患者情報をリレーション
        $pt_datas = ReservationDataModel::find($ptNo->No)->ForeignPatientData()->first();
        //var_dump($pt_datas);
                
        //予約情報を個別で取得
        $reservationDatas = ReservationDataModel::SearchReservationSeparate($request->search_reservation_No);
        //var_dump($reservationDatas);

        return view('patient_menu.delete_my_data_reservation',['reservationDatas'=>$reservationDatas,'pt_datas'=>$pt_datas]);
    }

    //マイページから予約削除完了ページへのアクション
    public function CompleteDeleteMyReservation(Request $request){
        //取得する数字が文字列で返ってくるので数値へ変換
        $resNo=(int)$request->searchReservationNo;
        $serach_pt_id=(int)$request->searchPtId;

        //予約モデルの削除メソッドを呼び出し予約テーブル削除
        $deleteMyReservation = ReservationDataModel::DeleteReservationData($resNo);
        return view('patient_menu.completed_delete_my_data_reservation',['serach_pt_id'=>$serach_pt_id]);


    }


}
