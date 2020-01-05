<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;
use App\Models\ReservationDataModel;

class ApointmentEditController extends Controller
{
    //予約新規追加の患者検索のコントローラ
    public function SearchPtNewReservation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.search_pt_new_reservation');
    }
    //予約新規追加の患者情報確認画面コントローラ
    public function NewReservation(Request $request) {
        //患者情報を取得
        $pt_datas = PatientDataModel::getPtData($request->search_pt_id);
        //予約情報を取得
        $reservation_datas = ReservationDataModel::SearchReservation($request->search_pt_id);

        //予約情報から患者情報をリレーションの為の主キー「No」取得
        $mainKey = PatientDataModel::Mainkey($request->search_pt_id);

        //予約情報から患者情報を主キーを用いてリレーション
        $foreignPatientDatas = ReservationDataModel::find($mainKey->No)->ForeignPatientData()->get();
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.new_reservation',['pt_datas'=>$pt_datas,'reservation_datas'=>$reservation_datas,'foreignPatientDatas'=>$foreignPatientDatas]);
    }

    //予約削除　情報確認のコントローラ
    public function DeleteReservationStatus(Request $request) {

        $reservationDatas = ReservationDataModel::SearchReservationSeparate($request->search_reservation_No);

        $pt_datas = PatientDataModel::getPtData($request->search_reservation_pt_id);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.delete_reservation',['reservationDatas'=>$reservationDatas,
        'pt_datas'=>$pt_datas,
        ]);
    }

    //予約削除完了のコントローラ
    public function CompleteDeleteReservation(Request $request) {

        $search_pt_id = $request->search_pt_id;
        ReservationDataModel::DeleteReservationData($request->searchReservationNo);

        
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.complete_delete_reservation',['search_pt_id'=>$search_pt_id]);
    }

    //予約状況確認のコントローラ　日付別
    public function CheckReservationStatus() {

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation_status');
    }



}
