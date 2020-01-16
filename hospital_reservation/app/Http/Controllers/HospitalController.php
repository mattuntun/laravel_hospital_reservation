<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function HospitalMenu(){
        return view('hospital_menu.hospital_menu');
    }

    //全科共通予約画面設定へのアクション
    public function CommonReservationSettingScreen() {
        return view('hospital_menu.common_reservation_setting_screen.common_reservation_setting_screen');
    }

    //患者情報編集へのアクション
    public function PatientRegistrationChangeDeletion() {
        return view('hospital_menu.patient_registration_change_deletion.patient_registration_change_deletion');
    }

    //患者予約情報編集へのアクション
    public function EditPatientAppoimtmentInformation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_patient_appoimtment_information');
    }

}
