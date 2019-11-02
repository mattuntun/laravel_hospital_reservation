<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hospital_view_controller extends Controller
{
    //全科共通予約画面設定へのアクション
    public function Common_reservation_setting_screen() {
        return view('hospital_view.Common_reservation_setting_screen');
    }

    //患者情報編集へのアクション
    public function patient_registration_change_deletion() {
        return view('hospital_view.patient_registration_change_deletion');
    }

    //患者予約情報編集へのアクション
    public function edit_patient_appoimtment_information() {
        return view('hospital_view.edit_patient_appoimtment_information');
    }

}
