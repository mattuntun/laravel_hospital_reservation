<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalDepartmentsDataModel;

class CommonSettingScreenController extends Controller
{
    //予約期間、期限の編集
    public function SetPeriodAndDeadline(){
        return view('hospital_menu.common_reservation_setting_screen.set_period_and_deadline');
    }

    //全科共通の、休診日設定
    public function HoridaySetting(){
        return view('hospital_menu.common_reservation_setting_screen.horiday_setting');
    }
    //開院・休憩・閉診設定
    public function OpeningRestClosingTime(){
        return view('hospital_menu.common_reservation_setting_screen.opening_rest_closing_time');
    }
    //設定完了全科共通 開院・休憩・閉診設定
    public function CompleteOpeningRestClosingTime(Request $request){
        $open_time_hour = $request->h_open_time;
        $open_time_min = $request->m_open_time;
        $close_time_hour = $request->h_close_time;
        $close_time_min = $request->m_close_stop;
        $restStart_time_hour = $request->h_rest_start;
        $restStart_time_min = $request->m_rest_start;
        $restStop_time_hour = $request->h_rest_stop;
        $restStop_time_min = $request->m_rest_stop;

        $open_time = "$open_time_hour"."$open_time_min"."00";
        $close_time ="$close_time_hour"."$close_time_min"."00";
        $restStart_time ="$restStart_time_hour"."$restStart_time_min"."00";
        $restStop_time ="$restStop_time_hour"."$restStop_time_min"."00";
        
        $changeTimes = array('open_time'=>$open_time,
                            'close_time'=>$close_time,
                            'restStart_time'=>$restStart_time,'restStop_time'=>$restStop_time);

        $changeAllTime =ClinicalDepartmentsDataModel::AllTimeChenge($changeTimes);

        return view('hospital_menu.common_reservation_setting_screen.complete_set_opening_rest_closing_time');
    }






    //予約数設定編集画面
    public function NumberOfReservationScreen(){
        return view('hospital_menu.common_reservation_setting_screen.number_of_reservation_screen');
    }
    //予約状況表示　設定編集画面
    public function StatusDisplaySetting(){
        return view('hospital_menu.common_reservation_setting_screen.status_display_setting');
    }
}
