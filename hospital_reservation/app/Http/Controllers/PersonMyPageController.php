<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDataModel;
use App\Models\PatientDataModel;
use App\Models\ClinicalDepartmentsDataModel;
use App\Models\Holiday;
use App\Calendar;
use App\NextCalendar;
use App\AfterNextCalendar;
use App\Schedule;

class PersonMyPageController extends Controller{   
    
    //患者マイページから予約削除ページへのアクション
    public function DeleteMyReservations(Request $request){
        
        //予約情報から患者情報をリレーション
        $pt_datas = ReservationDataModel::ForeignPatientsDatas($request->search_reservation_pt_id);

        //予約情報を個別で取得
        $reservationDatas = ReservationDataModel::SearchReservationSeparate($request->search_reservation_No);

        return view('patient_menu.delete_my_data_reservation',['reservationDatas'=>$reservationDatas,'pt_datas'=>$pt_datas]);
    }

    //マイページから予約削除完了ページへのアクション
    public function CompleteDeleteMyReservation(Request $request){
        //取得する数字が文字列で返ってくるので数値へ変換
        $resNo=(int)$request->searchReservationNo;
        $serach_pt_id=(int)$request->searchPtId;

          //予約モデルの削除メソッドを呼び出し予約テーブル削除
        $deleteMyReservation = ReservationDataModel::DeleteReservationData($resNo);

        return view('patient_menu.completed_delete_my_data_reservation',['serach_pt_id'=>$serach_pt_id]);
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

        //◎、〇、△の条件を呼び出し
        $doubleCircleReservationValue = 60;
        $circleReservationValue = 30;
        $triangleReservationValue = 0;

        //カレンダーPHPの呼び出し
        $cal = new Calendar();
        $tag = $cal->showCalendarTag($pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue);
        //翌月のカレンダー呼び出し
        $next_cal = new NextCalendar();
        $next_tag = $next_cal->showNextMonthCalendarTag($pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue);
        //翌々月のカレンダー呼び出し
        $after_next_cal = new AfterNextCalendar();
        $after_next_tag = $after_next_cal->showMonthAfterNextCalendarTag($pt_id,$search_Department,$doubleCircleReservationValue,$circleReservationValue,$triangleReservationValue);

        return view('patient_menu.calendar_add_new_reservation_from_mypage',['getDepartmentDatas'=>$getDepartmentDatas,
        'ptDatas'=>$ptDatas,
        'cal_tag' => $tag,
        'next_cal_tag'=>$next_tag,
        'after_next_cal_tag'=>$after_next_tag,
        'search_Department'=>$search_Department
        ]);
    }

    //マイページ⇒カレンダー⇒スケジュール
    public function ScheduleAddNewReservationFromMyPage(Request $request){

        //日付データの取得
        $target_day = $request->target_day;
        $target_month = $request->target_month;
        $target_year = $request->target_year;

        //診療年月日の文字列データ作成
        $targetDate = strval($target_year).strval($target_month).strval(str_pad($target_day, 2, 0, STR_PAD_LEFT));

        //患者IDと診療科名の取得
        $search_pt_id = $request->search_pt_id;
        $clinical_department = $request->search_Department;

        //スケジュールphpから画面取得(患者ID･診療科名･日付受け渡し)
        $make_schedule = new Schedule;
        $show_schedule = $make_schedule->MakeSchedule($clinical_department,$targetDate,$search_pt_id);
       
        //患者情報の取得
        $ptDatas = PatientDataModel::getPtData($search_pt_id);

        return view('patient_menu.schedule_add_new_reservation_from_mypage',['target_day'=>$target_day,
        'target_month'=>$target_month,
        'target_year'=>$target_year,
        'search_pt_id'=>$search_pt_id,
        'ptDatas'=>$ptDatas,
        'clinical_department'=>$clinical_department,
        'show_schedule'=>$show_schedule]);
    }

        //スケジュール⇒予約完了
        public function CompleteAddNewReservation(Request $request){
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

            return view('patient_menu.complete_add_new_reservation',
            ['ptDatas'=>$ptDatas]);
        }

        //スケジュール⇒予約完了⇒紹介状登録
        public function AddLetterOfIntroductionData(Request $request){
            //患者ID取得
            $search_pt_id =$request->search_pt_id;
            //患者情報の取得
            $ptDatas = PatientDataModel::getPtData($search_pt_id);
            
            return view('patient_menu.add_letter_of_introduction_data',
            ['ptDatas'=>$ptDatas]);
        }

        //スケジュール⇒予約完了⇒紹介状登録
        public function CompleteAddLetterOfIntroductionData(Request $request){
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

            return view('patient_menu.complete_add_letter_of_introduction',
            ['ptDatas'=>$ptDatas]);
        
        }
        
    
}
