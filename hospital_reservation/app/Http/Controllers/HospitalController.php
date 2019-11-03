<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    //全科共通予約画面設定へのアクション
    public function CommonReservationSettingScreen() {
        return view('hospital_view.Common_reservation_setting_screen');
    }

    //患者情報編集へのアクション
    public function PatientRegistrationChangeDeletion() {
        return view('hospital_view.patient_registration_change_deletion');
    }

    //患者予約情報編集へのアクション
    public function EditPatientAppoimtmentInformation() {
        return view('hospital_view.edit_patient_appoimtment_information');
    }

}
