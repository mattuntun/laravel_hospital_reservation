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
        
        //var_dump($changeTimes);

        $add = ClinicalDepartmentsDataModel::AddNewDepartment($changeTimes);

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.complete_add_new_department',['changeTimes'=>$changeTimes]);
    }

}
