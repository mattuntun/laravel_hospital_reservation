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
        $pt_data = ReservationDataModel::find($ptNo->No)->ForeignPatientData()->first();
        var_dump($pt_data);
                
        //予約情報を個別で取得
        $reservationData = ReservationDataModel::SearchReservationSeparate($request->search_reservation_No);
        var_dump($reservationData);

        return view('patient_menu.delete_my_data_reservation',['reservationData'=>$reservationData,'pt_data'=>$pt_data]);
    }
}
