<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonSettingScreenController extends Controller
{
    //予約期間、期限の編集
    public function SetPeriodAndDeadline(){
        return view('hospital_menu.common_reservation_setting_screen.set_period_and_deadline');
    }

    //全科共通の、休診日設定
    public function ClosedSetting(){
        return view('hospital_menu.common_reservation_setting_screen.closed_setting');
    }
}
