<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalDepartmentsDataModel;

class IndividualSettingMenucontroller extends Controller
{
    //診療科個別設定メニュー画面
    public function IndividualSettingMenu(){
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.individual_setting_menu');
    }
    //新規診療科追加画面
    public function AddNewDepartment(){
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.add_new_department');
    }
    //新規診療科設定完了画面
    public function CompleteAddNewDepartment(Request $request){
        $open_time_hour = $request->h_open_time;
        $open_time_min = $request->m_open_time;
        $close_time_hour = $request->h_close_time;
        $close_time_min = $request->m_close_stop;
        $restStart_time_hour = $request->h_rest_start;
        $restStart_time_min = $request->m_rest_start;
        $restStop_time_hour = $request->h_rest_stop;
        $restStop_time_min = $request->m_rest_stop;

        $new_department = $request->new_department;
        $possible_people = $request->possible_number;
        $open_time = "$open_time_hour"."$open_time_min"."00";
        $close_time ="$close_time_hour"."$close_time_min"."00";
        $restStart_time ="$restStart_time_hour"."$restStart_time_min"."00";
        $restStop_time ="$restStop_time_hour"."$restStop_time_min"."00";
        
        $changeTimes = array('new_department'=>$new_department,
                            'possible_people'=>$possible_people,
                            'open_time'=>$open_time,
                            'close_time'=>$close_time,
                            'restStart_time'=>$restStart_time,'restStop_time'=>$restStop_time);
        
        //診療科新規追加のメソッドの呼び出し
        $add = ClinicalDepartmentsDataModel::AddNewDepartment($changeTimes);

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.complete_add_new_department',['changeTimes'=>$changeTimes]);
    }

    //診療科削除検索画面
    public function SearchDeleteDepartment(){
        //診療科テーブルの情報全てを取得するメソッド呼び出し
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();
        foreach($getDepartments as $getDepartment){
            $kindDepartments[] = $getDepartment->clinical_department;
        }
                
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.search_delete_department',['kindDepartments'=>$kindDepartments]);
    }

    //診療科削除完了画面
    public function CompleteDeleteDepartment(Request $request){
        
        $deleteValue = $request->search_delete_department;
        //診療科情報削除のメソッドの呼び出し
        $derete_department = ClinicalDepartmentsDataModel::DeleteDepartment($deleteValue);
        
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.complete_delete_department');
    }

    //個別診療科別設定変更の検索画面へ
    public function IndividualChangeDepartment(){
        //診療科テーブルの情報全てを取得するメソッド呼び出し
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();
        foreach($getDepartments as $getDepartment){
            $kindDepartments[] = $getDepartment->clinical_department;
        }
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.search_individual_Change_department',['kindDepartments'=>$kindDepartments]);
    }
    
    //個別診療科別変更の設定コントローラ
    public function SetIndividualChangeDepartment(Request $request){
        //診療科個別でのデータ取得メソッド呼び出し
        $department_data =ClinicalDepartmentsDataModel::GetIndividualDepartmentdatas($request->search_individual_department);
        $department = $department_data->clinical_department;
        //可能なら初期値を設定したいexplode関数を使う
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.set_individual_Change_department',['department'=>$department]);
    }

    //個別診療科別変更完了のコントローラ
    public function CompleteIndividualChangeDepartment(Request $request){
        $open_time_hour = $request->h_open_time;
        $open_time_min = $request->m_open_time;
        $close_time_hour = $request->h_close_time;
        $close_time_min = $request->m_close_stop;
        $restStart_time_hour = $request->h_rest_start;
        $restStart_time_min = $request->m_rest_start;
        $restStop_time_hour = $request->h_rest_stop;
        $restStop_time_min = $request->m_rest_stop;

        $search_change_deparment = $request->search_deparment;
        $open_time = "$open_time_hour"."$open_time_min"."00";
        $close_time ="$close_time_hour"."$close_time_min"."00";
        $restStart_time ="$restStart_time_hour"."$restStart_time_min"."00";
        $restStop_time ="$restStop_time_hour"."$restStop_time_min"."00";
        
        $changeTimes = array('search_change_deparment'=>$search_change_deparment,
                            'open_time'=>$open_time,
                            'close_time'=>$close_time,
                            'restStart_time'=>$restStart_time,'restStop_time'=>$restStop_time);
        
        //診療科別の診療科設定変更メソッドの呼び出し
        $getDepartmentData = ClinicalDepartmentsDataModel::IndividualChangeDepartment($changeTimes);

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.complete_individual_Change_department',['changeTimes'=>$changeTimes]);
    }

}
