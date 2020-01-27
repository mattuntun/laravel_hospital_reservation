<?php

//患者情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;

class PatientRegistrationController extends Controller
{
    //新規患者登録、データ入力画面
    public function NewPatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.new_patient_registration');
    }

    //新規患者登録完了
    public function CompleteNewPatient(Request $request) {
        //前入力画面のバリデーション
        $request->validate([
            'pt_id'=>'required|integer|digits_between:1,10:',
            'pt_last_name'=>'required|string|max:100',
            'pt_name'=>'required|string|max:100',
            'pt_last_name_kata'=>'required|string|max:100',
            'pt_name_kata'=>'required|string|max:100',
            'birthday'=>'required|date',
            'email_adress'=>'required|email',
            'sex'=>'required|integer|between:1,2:',
        ]);

        //モデルから新規患者データ登録メソッド呼び出し
        $appNewPt = PatientDataModel::AddNewPtData($request);
        //モデルから患者データ検索メソッド呼び出し
        $ptData = PatientDataModel::getPtData($request->pt_id);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.complete_new_patient',['ptData'=>$ptData]);
    }

    //患者情報変更検索画面
    public function SearchChangePatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.search_change_patient_information');
    }
    //患者情報、サーチ後の画面
    public function ChangePatient(Request $request) {
        //モデルから患者データ検索メソッド呼び出し
        $pt_datas = PatientDataModel::getPtData($request->search_pt_id);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.change_patient_information',['pt_datas'=>$pt_datas]);
    }
    //患者情報変更完了の画面
    public function CompleteChangePatient(Request $request) {
        $changePtDatas = array('search_pt_id'=>$request->search_pt_id,
                               'ptLastName'=>$request->change_pt_last_name,
                               'ptName'=>$request->change_pt_name,
                               'ptLastNameKata'=>$request->change_pt_last_name_kata,
                               'ptNameKata'=>$request->change_pt_name_kata,);
        //モデルから患者情報変更メソッドの呼び出し
        PatientDataModel::ChangePtData($request);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.complete_change_patient_information',['changePtDatas'=>$changePtDatas]);
    }
    

    //患者情報削除検索画面
    public function SearchDeletePatient() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.search_delete_patient_information');
    }
    //患者情報削除、サーチ後の画面
    public function DeletePatient(Request $request) {
        //モデルから患者データ検索メソッド呼び出し
        $pt_datas = PatientDataModel::getPtData($request->search_pt_id);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.delete_patient_information',['pt_datas'=>$pt_datas]);
    }
    //患者情報削除完了のページ
    public function CompleteDeletePatient(Request $request) {
        //モデルから患者情報削除メソッド呼び出し
        $pt_deletes = PatientDataModel::DeletePatientData($request->search_pt_id);
        return view('hospital_menu.patient_registration_change_deletion.patient_information.complete_delete_patient_information');
    }

    //患者データ削除用パスワード変更画面
    public function ChangePass() {
        return view('hospital_menu.patient_registration_change_deletion.patient_information.delete_password_patient_change');
    }

}
