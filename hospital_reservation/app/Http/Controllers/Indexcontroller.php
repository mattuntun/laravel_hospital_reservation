<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\PatientDataModel;
//use App\Models\ReservationDataModel;

class Indexcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){
        return view('index');
    }
/*
    public function MyPageMenu(Request $request){
        
        //患者情報モデルから患者情報取得
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);

        //モデルのjoinを利用して個人情報⇒予約情報リレーション
        $foreignReservationDatas =\App\Models\PatientDataModel::ForeignReservationData($request->search_pt_id);
        
        if($foreignReservationDatas->isEmpty() == true){
            return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas,'foreignReservationDatas'=>null]);
        }else{
            return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas,'foreignReservationDatas'=>$foreignReservationDatas]);
        }
    }
    

    public function HospitalMenu(){
        return view('hospital_menu.hospital_menu');
    }
*/
}
