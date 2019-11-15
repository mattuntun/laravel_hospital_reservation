<?php

//患者情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientRegistrationContoroller extends Controller
{
    //新規患者登録
    public function NewPatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.new_patient_registration');
    }

    //患者情報変更
    public function ChangePatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.change_patient_information');
    }
    //患者情報変更ID検索後、詳細入力
    public function ChangePatientDetails() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.change_patient_information_details');
    }
    

    //患者情報削除
    public function DeletePatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.delete_patient_information');
    }

    //患者情報削除
    public function ChangePass() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.delete_password_patient_change');
    }

}
