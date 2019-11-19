<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
