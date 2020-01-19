<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\AllDepartmentHoliday;

class CommonSettingScreenController extends Controller
{
    //予約期間、期限の編集
    public function SetPeriodAndDeadline(){
        return view('hospital_menu.common_reservation_setting_screen.set_period_and_deadline');
    }


    //休診日設定に対し、日付指定で追加・隔週で追加の選択画面
    public function HoridaySetChoice(){
        return view('hospital_menu.common_reservation_setting_screen.horiday_set_choice');
    }

    //全科共通の、隔週休診日設定
    public function HoridaySetting(){
        return view('hospital_menu.common_reservation_setting_screen.horiday_setting');
    }

    //休診日設定に対し、全診療科共通へ日付指定で追加
    public function DateSpecificationHolidaySetAllDepartment(){
        //全休診日データを取得
        $get_holiday_datas = AllDepartmentHoliday::GetAllDepartmentHolidays();

        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas]);
    }

    //休診日設定に対し全診療科共通へ日付指定で追加(休日追加時)
    public function PostDateSpecificationHolidaySetAllDepartment(Request $request){
        //全休診日データを取得
        $get_holiday_datas = AllDepartmentHoliday::GetAllDepartmentHolidays();

        //休日追加の為のデータを配列化
        $add_holiday_data = array(
                                'check_Date'=>$request->check_Date,
                                'holiday_reason'=>$request->holiday_reason);

        //休日追加のメソッド呼び出し
        $add_holiday = AllDepartmentHoliday::AddAllDepartmentTargetHolidays($add_holiday_data);

        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas]);
    }
    
    //休診日設定画面で削除ボタンが押された場合
    public function DeleteHolidaySet(Request $request){

        //同ビュー画面にて削除ボタン押されたら
        if(isset($request->delete)){
            $delete_holiday = AllDepartmentHoliday::DeleteAllDepartmentHoliday($request->id);
        }

        //全休診日データを取得
        $get_holiday_datas = AllDepartmentHoliday::GetAllDepartmentHolidays();

        //同ビュー画面において休日情報が入力されたら追加メソッド呼び出しする
        if(isset($request->check_Date)){
            $add_holiday_data = array(
                'check_Date'=>$request->check_Date,
                'holiday_reason'=>$request->holiday_reason);

        //休日追加のメソッド呼び出し
        $add_holiday = AllDepartmentHoliday::AddAllDepartmentTargetHolidays($add_holiday_data);

        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas,'add_new_holiday'=>$add_new_holiday]);
        }else{
        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas]);

        }
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
    public function StatusDisplaySetting(Request $request){
        $possibleNumber = $request->possible_number;
        $chagePossiblePeople = ClinicalDepartmentsDataModel::ChangePossibleNumber($possibleNumber);
        return view('hospital_menu.common_reservation_setting_screen.status_display_setting',['possibleNumber'=>$possibleNumber]);
    }
}
