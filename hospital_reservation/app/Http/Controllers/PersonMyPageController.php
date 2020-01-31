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


use Auth;

class PersonMyPageController extends Controller{   


//authで認証させる。全てのページで、アクセスがあった場合にログインされていない状態だと login のページへ強制的にリダイレクト
public function __construct(){
       
    $this->middleware('auth:admin,user');
       
}


//患者用インデックスページへ
public function UesrIndex(){
    
    //コントローラファイルからbladeファイルへユーザー情報を渡す
    $auth = Auth::user();
     return view('user_index',['auth'=>$auth]);
 }

    //患者マイページへ
    public function MyPageMenu(Request $request){
        

        //前画面入力値のバリデーション
        $request->validate([
            'search_pt_id'=>'required|integer|digits_between:1,10:|exists:pt_data,pt_id',
            'patient_pass'=>'required',            
        ]);
        
        //患者情報モデルから患者情報取得
        $ptDatas = PatientDataModel::getPtData($request->search_pt_id);
        var_dump($ptDatas);

        //患者情報モデルから患者生年月日を取得
        foreach($ptDatas as $items) {
            $pt_birthday = $items->birthday ;
        }

        //入力した患者生年月日とDBの生年月日が一致か確認
        $input_pass = $request->patient_pass;
        echo $input_pass;

        if($pt_birthday == $input_pass)
        //入力したパスワードと患者生年月日が同じだった場合、マイページを表示
        {
            //モデルのjoinを利用して個人情報⇒予約情報リレーション
            $foreignReservationDatas =\App\Models\PatientDataModel::ForeignReservationData($request->search_pt_id);
            
            if($foreignReservationDatas->isEmpty() == true)
            //患者IDで検索して予約情報がなかった場合、予約情報をnullでデータを渡す
            {
                return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas,'foreignReservationDatas'=>null]);
            } 
            else//患者IDで検索して予約情報があった場合予約情報を渡す
             {
                return view('patient_menu.mypage_menu',['ptDatas'=>$ptDatas,'foreignReservationDatas'=>$foreignReservationDatas]);
            }

        } else {
            //$test = "患者IDとパスワードが一致していません";
            return back()->with('result', '患者IDとパスワードが一致していません')->withInput();
        }
    }
    
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

        //半日診療日のデータを取り出し
        //$half_week_day = ClinicalDepartmentsDataModel::GetHalfWeekData($search_Department);
        

        //診療科モデルから空き表示条件を取得
        $getDepartmentDatas = ClinicalDepartmentsDataModel::GetCapacityDatas($search_Department);
        //◎、〇、△の条件を呼び出し
        $doubleCircleReservationValue = $getDepartmentDatas['doubleCircleReservationValue'];  //◎
        $circleReservationValue = $getDepartmentDatas['circleReservationValue'];  //〇
        $triangleReservationValue = $getDepartmentDatas['triangleReservationValue'];  //△

        //カレンダーPHPの呼び出し
        $cal = new Calendar();
        $tag = $cal->showCalendarTag($pt_id,
                                    $search_Department,
                                    $doubleCircleReservationValue,
                                    $circleReservationValue,
                                    $triangleReservationValue);
                                    
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

        //患者IDと診療科名の取得
        $search_pt_id = $request->search_pt_id;
        $clinical_department = $request->search_Department;

        //診療科から半日条件を取得(0:日曜日～6:土曜日　7:半日なし)
        $half_week_day_point = ClinicalDepartmentsDataModel::GetHalfWeekData($clinical_department);
                
        //診療年月日の文字列データ作成
        $targetDate = strval($target_year).strval($target_month).strval(str_pad($target_day, 2, 0, STR_PAD_LEFT));

        //スケジュールphpから画面取得(患者ID･診療科名･日付受け渡し)
        $make_schedule = new Schedule;
        $show_schedule = $make_schedule->MakeSchedule($clinical_department, $targetDate, $half_week_day_point, $search_pt_id);
       
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
