<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDataModel;
use App\Models\PatientDataModel;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\Holiday;
use App\Calendar;
use App\NextCalendar;

class PersonMyPageController extends Controller
{   
    
    //患者マイページから予約削除ページへのアクション
    public function DeleteMyReservations(Request $request){
        
        //患者IDから患者テーブル主キー獲得
        $ptNo = PatientDataModel::Mainkey($request->search_reservation_pt_id);
        
        //予約情報から患者情報をリレーション
        $pt_datas = ReservationDataModel::find($ptNo->No)->ForeignPatientData()->first();
        //var_dump($pt_datas);
                
        //予約情報を個別で取得
        $reservationDatas = ReservationDataModel::SearchReservationSeparate($request->search_reservation_No);
        //var_dump($reservationDatas);

        return view('patient_menu.delete_my_data_reservation',['reservationDatas'=>$reservationDatas,'pt_datas'=>$pt_datas]);
    }

    //マイページから予約削除完了ページへのアクション
    public function CompleteDeleteMyReservation(Request $request){
        //取得する数字が文字列で返ってくるので数値へ変換
        $resNo=(int)$request->searchReservationNo;
        $serach_pt_id=(int)$request->searchPtId;

        //予約モデルの削除メソッドを呼び出し予約テーブル削除
        $deleteMyReservation = ReservationDataModel::DeleteReservationData($resNo);
        return view('patient_menu.completed_delete_my_data_reservation',['serach_pt_id'=>$search_pt_id]);
    }

    //マイページから新規予約の為の診療科選択画面
    public function SelectAddNewReservationFromMyPage(Request $request){
        //pt_idの引継ぎ⇒患者情報取得
        $search_pt_id = (int)$request->search_pt_id;
        $ptDatas = PatientDataModel::getPtData($search_pt_id);
        
        //診療科情報の取得
        $getDepartments = ClinicalDepartmentsDataModel::GetDepartmentsData();

        return view('patient_menu.select_add_new_reservation_from_mypage',['getDepartments'=>$getDepartments,'ptDatas'=>$ptDatas]);
    }

    //マイページから新規予約カレンダーへ
    public function CalendarAddNewReservationFromMyPage(Request $request){
        //選択した診療科情報を取得
        $search_Department =$request->selectedDepartment;
        $getDepartmentDatas = ClinicalDepartmentsDataModel::GetIndividualDepartmentdatas($search_Department);

        //患者情報の呼び出し
        $pt_id = $request->search_pt_id;
        $ptDatas = PatientDataModel::getPtData($pt_id);
        //var_dump($ptData);

        //カレンダーPHPの呼び出し
        $cal = new Calendar();
        $tag = $cal->showCalendarTag();

        $next_cal = new NextCalendar();
        $next_tag = $next_cal->showNextMonthCalendarTag();

        return view('patient_menu.calendar_add_new_reservation_from_mypage',['getDepartmentDatas'=>$getDepartmentDatas,'cal_tag' => $tag,'next_cal_tag'=>$next_tag,'ptDatas'=>$ptDatas]);
    }

    //マイページ⇒カレンダー⇒スケジュール
    public function ScheduleAddNewReservationFromMyPage(Request $request){
        $target_day = $request->target_day;
        $target_month = $request->target_month;
        $target_year = $request->target_year;
        
        
        var_dump($target_day);

       
        return view('patient_menu.schedule_add_new_reservation_from_mypage',['target_day'=>$target_day,'target_month'=>$target_month,'target_year'=>$target_year]);
    }
    
}
