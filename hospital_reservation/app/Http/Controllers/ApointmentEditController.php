<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\getPatientDataModel;

class ApointmentEditController extends Controller
{
    //予約新規追加の患者検索のコントローラ
    public function SearchPtNewReservation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.search_pt_new_reservation');
    }
    //予約新規追加の患者情報確認画面コントローラ
    public function NewReservation(Request $request) {
        $pt_datas = getPatientDataModel::getPtData($request->search_pt_id);
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.new_reservation',['pt_datas'=>$pt_datas]);
    }

    //予約削除のコントローラ
    public function DeleteReservation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.delete_reservation');
    }

    //予約状況確認のコントローラ
    public function CheckReservationStatus() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation_status');
    }

    //予約状況確認(患者別)のコントローラ
    public function CheckReservationPatient() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation.check_reservation_patient');
    }


}
