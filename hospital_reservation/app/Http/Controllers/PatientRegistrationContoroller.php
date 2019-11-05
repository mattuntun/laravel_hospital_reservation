<?php

//患者情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientRegistrationContoroller extends Controller
{
    //新規患者登録
    public function NewPatient() {
        return view('hospital_menu.new_patient_registration');
    }

    //患者情報変更
    public function ChangePatient() {
        return view('hospital_menu.change_patient_information');
    }


}
