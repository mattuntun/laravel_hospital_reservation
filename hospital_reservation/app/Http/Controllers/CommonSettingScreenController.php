<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\AllDepartmentHoliday;

class CommonSettingScreenController extends Controller
{
    //adminでログインしていないとビュー不可
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //エラーページビュー
    public function SetPeriodAndDeadline() {
        return view('hospital_menu.common_reservation_setting_screen.set_period_and_deadline');
    }
    
    //エラーページビュー
    public function ErrorPageView() {
        return view('hospital_menu.common_reservation_setting_screen.error_page');
    }


    //休診日設定に対し、日付指定で追加・隔週で追加の選択画面
    public function HoridaySetChoice() {
        return view('hospital_menu.common_reservation_setting_screen.horiday_set_choice');
    }

    //全科共通の、隔週休診日設定
    public function HoridaySetting() {
        return view('hospital_menu.common_reservation_setting_screen.horiday_setting');
    }

    //休診日設定に対し、全診療科共通へ日付指定で追加
    public function DateSpecificationHolidaySetAllDepartment() {
        //全休診日データを取得
        $get_holiday_datas = AllDepartmentHoliday::GetAllDepartmentHolidays();

        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas]);
    }

    //休診日設定に対し全診療科共通へ日付指定で追加(休日追加時)
    public function PostDateSpecificationHolidaySetAllDepartment(Request $request) {
        //日付指定された時のバリデーション
        $request->validate([
            'check_Date'=>'required|date_format:Y-m-d|',
            'holiday_reason'=>'required|string|max:30'
        ]);

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
    public function DeleteHolidaySet(Request $request) {

        //同ビュー画面にて削除ボタン押されたら
        if(isset($request->delete)) {
            $delete_holiday = AllDepartmentHoliday::DeleteAllDepartmentHoliday($request->id);
        }

        //全休診日データを取得
        $get_holiday_datas = AllDepartmentHoliday::GetAllDepartmentHolidays();

        //同ビュー画面において休日情報が入力されたら追加メソッド呼び出しする
        if(isset($request->check_Date)) {
            $add_holiday_data = array(
                'check_Date'=>$request->check_Date,
                'holiday_reason'=>$request->holiday_reason);

        //休日追加のメソッド呼び出し
        $add_holiday = AllDepartmentHoliday::AddAllDepartmentTargetHolidays($add_holiday_data);

        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas,'add_new_holiday'=>$add_new_holiday]);
        } else {
        return view('hospital_menu.common_reservation_setting_screen.date_specification_holiday_set',['get_holiday_datas'=>$get_holiday_datas]);

        }
    }

    //開院・休憩・閉診設定
    public function OpeningRestClosingTime() {
        return view('hospital_menu.common_reservation_setting_screen.opening_rest_closing_time');
    }
    //設定完了全科共通 開院・休憩・閉診設定
    public function CompleteOpeningRestClosingTime(Request $request){
        
        //前画面でのバリデーション
        $request->validate([
            'h_open_time'=>'required',
            'm_open_time'=>'required|',
            'h_rest_start'=>'required',
            'm_rest_start'=>'required',
            'h_rest_stop'=>'required',
            'm_rest_stop'=>'required',
            'h_close_time'=>'required',
            'm_close_stop'=>'required',
            'half_week_day'=>'required',
            'half_h_open_time'=>'required',
            'half_m_open_time'=>'required',
            'half_h_close_time'=>'required',
            'half_m_close_stop'=>'required',
        ]);

        //前画面より入力情報取得
        $open_time_hour = $request->h_open_time;            //開診時間取得(時) 
        $open_time_min = $request->m_open_time;             //開診時間取得(分)
        $close_time_hour = $request->h_close_time;          //閉診時間取得(時)
        $close_time_min = $request->m_close_stop;           //閉診時間取得(分)
        $restStart_time_hour = $request->h_rest_start;      //休憩開始時間取得(時)
        $restStart_time_min = $request->m_rest_start;       //休憩開始時間取得(分)
        $restStop_time_hour = $request->h_rest_stop;      //休憩終了時間取得(時)
        $restStop_time_min = $request->m_rest_stop;       //休憩終了時間取得(分)

        $half_open_time_hour = $request->half_h_open_time;   //半日診療開診時間取得(時)
        $half_open_time_min = $request->half_m_open_time;    //半日開診時間取得(時)
        $half_close_time_hour = $request->half_h_close_time;  //半日診療終了時間取得(時)
        $half_close_time_min = $request->half_m_close_stop;   //半日終了時間取得(時)


        $open_time = "$open_time_hour"."$open_time_min"."00";                   //診療開始時間を時間表示
        $close_time ="$close_time_hour"."$close_time_min"."00";                 //診療終了時間を時間表示
        $restStart_time ="$restStart_time_hour"."$restStart_time_min"."00";     //休憩開始時間を時間表示
        $restStop_time ="$restStop_time_hour"."$restStop_time_min"."00";        //休憩終了時間を時間表示

        $half_open_week = $request->half_week_day;           //半日診療曜日取得(0:日曜日～6:土曜日 7:半日設定なし)
        $half_open_time = "$half_open_time_hour"."$half_open_time_min"."00";    //半日診療開院時間
        $half_close_time = "$half_close_time_hour"."$half_close_time_min"."00"; //半日診療閉院時間
        
        $changeTimes = array('open_time'=>$open_time,                   //診療開始
                            'close_time'=>$close_time,                  //診療終了
                            'restStart_time'=>$restStart_time,          //休憩開始
                            'restStop_time'=>$restStop_time,            //休憩終了
                            'half_week_day'=>$half_open_week,            //半日設定曜日
                            'half_open_time'=>$half_open_time,          //半日開始時間
                            'half_close_time'=>$half_close_time,);      //半日終了時間

        $changeAllTime =ClinicalDepartmentsDataModel::AllTimeChenge($changeTimes);

        return view('hospital_menu.common_reservation_setting_screen.complete_set_opening_rest_closing_time');
    }

    //予約数設定編集画面
    public function NumberOfReservationScreen() {
        return view('hospital_menu.common_reservation_setting_screen.number_of_reservation_screen');
    }
    //予約状況表示　設定編集画面
    public function StatusDisplaySetting(Request $request) {

        //前画面でのバリデーション
        $request->validate([
            'possible_number'=>'required|integer',
        ]);
        
        //予約可能人数の登録メソッドを呼び出し
        $possibleNumber = $request->possible_number;
        $chagePossiblePeople = ClinicalDepartmentsDataModel::ChangePossibleNumber($possibleNumber);
        return view('hospital_menu.common_reservation_setting_screen.status_display_setting',['possibleNumber'=>$possibleNumber]);
    }
    //予約数・予約状況表示　設定編集画面
    public function CompleteNumberAndStatusSetting(Request $request) {
        
        //前画面でのバリデーション
        $request->validate([
            'doubleCircleReservationValue'=>'required|integer',
            'circleReservationValue'=>'required|integer',
            'triangleReservationValue'=>'required|integer',
        ]);

        //前画面より◎、〇、△の値を取得
        $doubleCircle = $request->doubleCircleReservationValue;
        $circle = $request->circleReservationValue;
        $triangle = $request->triangleReservationValue;
        
        //◎、〇、△の値を配列へ
        $capacity_parcent = [];
        $capacity_parcent['doubleCircle'] = $doubleCircle;
        $capacity_parcent['circle'] = $circle;
        $capacity_parcent['triangle'] = $triangle;

        //◎、〇、△の値をDBへ登録
        ClinicalDepartmentsDataModel::AllCapacitySet($capacity_parcent);

        return view('hospital_menu.common_reservation_setting_screen.complete_status_display_setting');
    }
}
