<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\holiday;

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

    //個別診療科別開院等設定変更の検索画面へ
    public function IndividualChangeDepartment(){
        //診療科テーブルの情報全てを取得するメソッド呼び出し
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();
        foreach($getDepartments as $getDepartment){
            $kindDepartments[] = $getDepartment->clinical_department;
        }
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.search_individual_Change_department',['kindDepartments'=>$kindDepartments]);
    }
    
    //個別診療科別開院等変更の設定コントローラ
    public function SetIndividualChangeDepartment(Request $request){
        //診療科個別でのデータ取得メソッド呼び出し
        $department_data =ClinicalDepartmentsDataModel::GetIndividualDepartmentdatas($request->search_individual_department);
        $department = $department_data->clinical_department;
        //可能なら初期値を設定したいexplode関数を使う
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.set_individual_Change_department',['department'=>$department]);
    }

    //個別診療科別開院等変更完了のコントローラ
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

    //診療科別の予約可能枠に関する設定⇒診療科検索画面
    public function SearchDepartmentPossibleNumber(){
        
        //全診療科のデータを取得
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();
        //全診療科診療科名の配列を作成
        foreach($getDepartments as $getDepartment){
            $kindDepartments[] = $getDepartment->clinical_department;
        }

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.search_department_possible_number',['kindDepartments'=>$kindDepartments]);
    }

    //個別診療科予約可能数の設定へ
    public function NumberOfReservationScreen(Request $request){

        //全画面で取診した療科名を取得
        $search_individual_department = $request->search_individual_department;
    
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.individual_number_of_reservation_screen',['search_individual_department'=>$search_individual_department]);
    }

    //個別診療科予約空き状況設定画面へ
    public function IndividualStatusDisplaySetting(Request $request){
        //前画面から診療科名、予約可能数を取得
        $possible_number = $request->possible_number;
        $search_individual_department = $request->search_individual_department;

        //診療科別の予約可能人数の変更を行うメソッドの呼び出し
        ClinicalDepartmentsDataModel::ChangeIndividualPossibleNumber($search_individual_department,$possible_number);

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.individual_status_display_setting',['possibleNumber'=>$possible_number, 'search_individual_department'=>$search_individual_department]);
    }

    //個別診療科予約可能数・予約空き状況設定完了
    public function CompleteNumberAndStatusSetting(Request $request){
        //前画面から診療科名を取得
        $search_individual_department = $request->search_individual_department;

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
        ClinicalDepartmentsDataModel::ChangeCapacitySet($search_individual_department,$capacity_parcent);

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.complete_status_display_setting',['search_individual_department'=>$search_individual_department]);
    }



    //休診日設定を変更する診療科を選択
    public function SelectDepartmentHolidaySet(){
        
        //診療科名を取得⇒配列にして渡す
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();
        foreach($getDepartments as $getDepartment){
            $kindDepartments[] = $getDepartment->clinical_department;
        }
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.search_set_holidays',['kindDepartments'=>$kindDepartments]);
    }

    //休診日設定に対し、日付指定で追加・隔週で追加の選択画面
    public function HolidaySetIndividualChoice(Request $request){

        //前画面から選択された診療科名を取得
        $search_individual_department = $request->search_individual_department;

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.department_horiday_set_choice',['search_individual_department'=>$search_individual_department]);
    }

    //休診日設定に対し、隔週で追加の画面
    public function WeekHolidaySetIndividualChoice(Request $request){

        //前画面から選択された診療科名を取得
        $search_individual_department = $request->search_individual_department;

        return view('hospital_menu.common_reservation_setting_screen.individual_setting.department_weekly_horiday_setting',['search_individual_department'=>$search_individual_department]);
    }

    //休診日設定に対し、日付指定で休日追加の画面
    public function DateSpecificationHolidaySetIndividualChoice(Request $request){

        //前画面から選択された診療科名を取得
        $search_individual_department = $request->search_individual_department;

        //休日モデルからデータ全データ取得
        $get_holiday_datas = holiday::GetHolidaysDatas($search_individual_department);

        //同ビュー画面において休日情報が入力されたら追加メソッド呼び出しする
        if(isset($request->check_Date)){
            $add_holiday_datas = array('search_individual_department'=>$search_individual_department,
                                        'check_Date'=>$request->check_Date,
                                        'holiday_reason'=>$request->holiday_reason);

            $add_new_holiday = holiday::AddHoliday($add_holiday_datas);            
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.date_specification_holiday_set_individual',['search_individual_department'=>$search_individual_department,'get_holiday_datas'=>$get_holiday_datas,'add_new_holiday'=>$add_new_holiday]);
        }else{
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.date_specification_holiday_set_individual',['search_individual_department'=>$search_individual_department,'get_holiday_datas'=>$get_holiday_datas]);}
    }

                
    //休診日設定画面で削除ボタンが押された場合
    public function DeleteHolidaySet(Request $request){

        //同ビュー画面にて削除ボタン押されたら
        if(isset($request->delete)){
            $delete_holiday = holiday::DeleteHoliday($request->id);
            //$holiday = Holiday::where('id','=',$request->id)->first();
            //$holiday->delete();
        }

        //前画面から選択された診療科名を取得
        $search_individual_department = $request->search_individual_department;

        //休日モデルからデータ全データ取得
        $get_holiday_datas = holiday::GetHolidaysDatas($search_individual_department);

        //同ビュー画面において休日情報が入力されたら追加メソッド呼び出しする
        if(isset($request->check_Date)){
            $add_holiday_datas = array('search_individual_department'=>$search_individual_department,
                                        'check_Date'=>$request->check_Date,
                                        'holiday_reason'=>$request->holiday_reason);

            $add_new_holiday = holiday::AddHoliday($add_holiday_datas);            
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.date_specification_holiday_set_individual',['search_individual_department'=>$search_individual_department,'get_holiday_datas'=>$get_holiday_datas,'add_new_holiday'=>$add_new_holiday]);
        }else{
        return view('hospital_menu.common_reservation_setting_screen.individual_setting.date_specification_holiday_set_individual',['search_individual_department'=>$search_individual_department,'get_holiday_datas'=>$get_holiday_datas]);

        }


    }
    

}
