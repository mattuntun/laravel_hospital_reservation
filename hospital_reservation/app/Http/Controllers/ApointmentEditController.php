<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;
use App\Models\ReservationDataModel;
use App\Models\ClinicalDepartmentsDataModel;
use App\HospitalCalendar;
use App\HospitalNextCalendar;
use App\HospitalAfterNextCalendar;
use App\HospitalSchedule;

class ApointmentEditController extends Controller
{
    //予約新規追加の患者検索のコントローラ
    public function SearchPtNewReservation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.search_pt_new_reservation');
    }
    
    //予約新規追加の患者情報確認画面コントローラ
    public function NewReservation(Request $request) {
        //患者情報を取得
        $pt_datas = PatientDataModel::getPtData($request->search_pt_id);

        //予約情報を取得
        $reservation_datas = ReservationDataModel::SearchReservation($request->search_pt_id);

        //クエリビルダで患者モデル⇒予約モデルリレーション
        $foreignPatientDatas = PatientDataModel::ForeignReservationData($request->search_pt_id);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.new_reservation',['pt_datas'=>$pt_datas,'reservation_datas'=>$reservation_datas,'foreignPatientDatas'=>$foreignPatientDatas]);
    }

    //予約削除　情報確認のコントローラ
    public function DeleteReservationStatus(Request $request) {

        //予約情報取得
        $reservationDatas = ReservationDataModel::SearchReservationSeparate($request->search_reservation_No);

        //患者情報取得
        $pt_datas = PatientDataModel::getPtData($request->search_reservation_pt_id);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.delete_reservation',['reservationDatas'=>$reservationDatas,
        'pt_datas'=>$pt_datas,
        ]);
    }

    //予約削除完了のコントローラ
    public function CompleteDeleteReservation(Request $request) {

        //予約モデルの削除メソッドを実行
        $search_pt_id = $request->search_pt_id;
        ReservationDataModel::DeleteReservationData($request->searchReservationNo);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.complete_delete_reservation',['search_pt_id'=>$search_pt_id]);
    }

    //予約追加の為の診療科選択画面
    public function SelectDepartmentReservation(Request $request) {
        //患者情報取得
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);

        //診療科情報取得
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.select_add_new_reservation',['ptDatas'=>$ptDatas,
        'getDepartments'=>$getDepartments]);
    }

    //予約追加の為の診療科選択画面(カレンダー)
    public function SelectDateReservation(Request $request) {
        
        //患者情報取得
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);
        $pt_id = $request->search_pt_id;

        //診療科選択画面にて取得した診療科情報取得
        $search_Department = $request->selectedDepartment;

        //◎、〇、△の条件を呼び出し
        $doubleCircleReservationValue = 60;
        $circleReservationValue = 30;
        $triangleReservationValue = 0;

        //病院用カレンダー取得
        $hos_calendar = new HospitalCalendar;
        $cal_tag = $hos_calendar->showCalendarTag($pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue);

        //病院用カレンダー取得(翌月) 
        $next_hos_calendar = new HospitalNextCalendar;
        $next_cal_tag = $next_hos_calendar->showNextMonthCalendarTag($pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue);

        //病院用カレンダー取得(翌々月)
        $after_next_hos_calendar = new HospitalAfterNextCalendar;
        $after_next_cal_tag = $after_next_hos_calendar->showMonthAfterNextCalendarTag($pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.calendar_add_new_reservation',
        ['ptDatas'=>$ptDatas,
        'search_Department'=>$search_Department,
        'cal_tag'=>$cal_tag,
        'next_cal_tag'=>$next_cal_tag,
        'after_next_cal_tag'=>$after_next_cal_tag]);
    }

    //予約追加の為の診療科選択画面(スケジュール)
    public function SelectTimeReservation(Request $request) {

        //日付データの取得
        $target_day = $request->target_day;
        $target_month = $request->target_month;
        $target_year = $request->target_year;

        //選択した患者IDと診療科名を取得
        $search_pt_id = $request->search_pt_id;
        $clinical_department = $request->search_Department;

        //診療年月日の文字列データ作成
        $targetDate = strval($target_year).strval($target_month).strval(str_pad($target_day, 2, 0, STR_PAD_LEFT));

        //スケジュールphpを呼び出し・取得
        $make_schedule = new HospitalSchedule;
        $show_schedule = $make_schedule->MakeSchedule($clinical_department
                                                        ,$targetDate
                                                        ,$search_pt_id);


        //患者情報取得
        $ptDatas = PatientDataModel::getPtData($search_pt_id);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.schedule_add_new_reservation',
        ['target_day'=>$target_day,
        'target_month'=>$target_month,
        'target_year'=>$target_year,
        'search_pt_id'=>$search_pt_id,
        'ptDatas'=>$ptDatas,
        'clinical_department'=>$clinical_department,
        'show_schedule'=>$show_schedule]);
    }
    
    //予約完了
    public function CompleteAddReservation(Request $request){
        //患者IDと予約診療科名の取得
        $search_pt_id =$request->search_pt_id;
        $search_department = $request->clinical_department;

        //患者情報の取得
        $ptDatas = PatientDataModel::getPtData($search_pt_id);

        //診療日・時間の取得
        $targetDate = $request->targetDate;
        $targetTime = $request->targetTime;

        //予約モデルの新規登録追加メソッド呼び出し
        $addReserve = ReservationDataModel::AppReservationDatas($search_pt_id,$search_department,$targetDate,$targetTime);

        
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.complete_add_reservation',
        ['ptDatas'=>$ptDatas]);
    }

    //紹介状登録
    public function RegistrationLetterOfIntroduction(Request $request){
        
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.hos_add_letter_of_introduction_data',['ptDatas'=>$ptDatas]);
    }

    //紹介状登録完了
    public function CompleteLetterOfIntroduction(Request $request){
        //患者ＩＤ取得
        $pt_id = $request->pt_id;
            
        //患者情報取得
        $ptDatas = PatientDataModel::getPtData($pt_id);

        //紹介状情報取得
        $introduction_hp_name = $request->introduction_hp;
        $introduction_hp_tell = $request->introduction_hp_tell;
        $introduct_lastDate = $request->introduct_lastDate;

        //予約モデルの紹介状登録メソッド呼び出し
        ReservationDataModel::AppIntroduceDatas($pt_id,$introduction_hp_name,$introduction_hp_tell,$introduct_lastDate);

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.complete_registration_letter_of_introduction',
        ['ptDatas'=>$ptDatas]);
    }

    //予約状況確認のコントローラ　日付別
    public function CheckReservationStatus(Request $request) {
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();

        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation_status',
        ['getDepartments'=>$getDepartments]);
    }

    //直接日付入力による確認画面
    public function TargetDateAllReservationCheck(Request $request) {
        //前画面より指定した予約確認日と診療科名を取得
        $target_date = $request->check_Date;
        $selectedDepartment = $request->selectedDepartment;

        //診療科モデルから予約モデルを経由して患者モデルへリレーション・全ての予約情報及び患者情報取得
        $all_reservations_and_pt_datas = ClinicalDepartmentsDataModel::ForeignPatientData($selectedDepartment,$target_date);


        if($all_reservations_and_pt_datas->isEmpty() == true){
            return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.target_date_all_reservation_check',['target_date'=>$target_date,
            'selectedDepartment'=>$selectedDepartment,
            'all_reservations_and_pt_datas'=>null]);
        }else{
            return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.target_date_all_reservation_check',['target_date'=>$target_date,
            'selectedDepartment'=>$selectedDepartment,
            'all_reservations_and_pt_datas'=>$all_reservations_and_pt_datas]);
        }
    
    }

}
