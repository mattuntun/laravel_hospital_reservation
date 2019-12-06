<?php

//患者情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\getPatientDataModel;
use App\Models\AddNewPtModel;
use Carbon\Carbon; 

class PatientRegistrationController extends Controller
{
    //新規患者登録
    public function NewPatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.new_patient_registration');
    }
    //新規患者登録完了
    public function CompleteNewPatient(Request $request) {
        $newPtAdd = new AddNewPtModel;
        $newPtAdd->pt_id = $request->input('pt_id');
        $newPtAdd->pt_last_name = $request->input('pt_last_name');
        $newPtAdd->pt_name = $request->input('pt_name');
        $newPtAdd->pt_last_name_kata = $request->input('pt_last_name_kata');
        $newPtAdd->pt_name_kata = $request->input('pt_name_kata');
        $newPtAdd->birthday = $request->input('birthday');
        $newPtAdd->email_adress = $request->input('email_adress');
        $newPtAdd->sex = $request->input('sex');
        $newPtAdd->save();

        $ptdata ='患者データ';
        
        /*$newPtDatas = AddNewPtModel::AddNewDatas($request->newPtDatas);*/

        return view('hospital_menu.patient_registration_change_deletion.patient_information.complete_new_patient',['ptdata'=>$ptdata]);
    }

    //患者情報変更
    public function SearchChangePatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.search_change_patient_information');
    }
    //患者情報変更ID検索後、詳細入力
    public function ChangePatient(Request $request) {
        $pt_datas = getPatientDataModel::getPtData($request->search_pt_id);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.change_patient_information',['pt_datas'=>$pt_datas]);
    }
    

    //患者情報削除
    public function SearchDeletePatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.search_delete_patient_information');
    }
    //患者情報削除
    public function DeletePatient(Request $request) {
        $pt_datas = getPatientDataModel::getPtData($request->search_pt_id);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.delete_patient_information',['pt_datas'=>$pt_datas]);
    }

    //患者情報削除
    public function ChangePass() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.delete_password_patient_change');
    }

}
