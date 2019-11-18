<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualSettingMenucontroller extends Controller
{
    //診療科個別設定
    public function IndividualSettingMenu(){
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.individual_setting_menu');
    }

}
