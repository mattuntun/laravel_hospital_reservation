<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;

class Indexcontroller extends Controller
{
    public function Index(){
        return view('index');
    }

    public function MyPageMenu(Request $request){
        //患者情報モデルから患者情報取得
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);
        return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas]);
    }


    public function HospitalMenu(){
        return view('hospital_menu.hospital_menu');
    }


}
