<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//return view('welcome');
//});

//indexページへ
Route::get('index','Indexcontroller@Index');

//管理者indexページへ
Route::get('admin/index','HospitalController@AdminIndex');
//ユーザーindexページへ
Route::any('user/index','PersonMyPageController@UesrIndex');


//マイページへ
Route::post('index/mypage_menu','PersonMyPageController@MyPageMenu');
//マイページから予約削除
Route::post('mypage/delete_my_data_reservation','PersonMyPageController@DeleteMyReservations');
//マイページから予約削除完了
Route::post('mypage/complete_delete_my_data_reservation','PersonMyPageController@CompleteDeleteMyReservation');
//マイページから新規予約の為の診療科選択
Route::post('mypage/select_add_new_my_data_reservation','PersonMyPageController@SelectAddNewReservationFromMyPage');
//マイページからカレンダー画面
Route::post('mypage/calendar_add_new_my_data_reservation','PersonMyPageController@CalendarAddNewReservationFromMyPage');
//マイページ⇒カレンダー⇒スケジュール画面
Route::post('mypage/schedule_add_new_my_data_reservation','PersonMyPageController@ScheduleAddNewReservationFromMyPage');
//スケジュール⇒予約完了
Route::post('mypage/complete_add_new_reservation','PersonMyPageController@CompleteAddNewReservation');
//予約完了⇒紹介状情報追加
Route::post('mypage/add_letter_of_introduction_data','PersonMyPageController@AddLetterOfIntroductionData');
//紹介状情報追加⇒追加完了
Route::post('mypage/complete_add_letter_of_introduction_data','PersonMyPageController@CompleteAddLetterOfIntroductionData');
Route::get('mypage/complete_add_letter_of_introduction','PersonMyPageController@CompleteAddLetterOfIntroductionData');


//病院menuページへ
Route::post('index/hospital_menu','HospitalController@HospitalMenu');
//病院menuページへ
Route::get('index/hospital_menu','HospitalController@HospitalMenu');

//病院ページ内のエラービューページ
Route::get('error','CommonSettingScreenController@ErrorPageView');

//予約情報エクセル　ダウンロードビューページ
Route::get('hospital_menu/complete_download','ExcelReservationController@DownloadReservation');
//予約情報をエクスポート
Route::get('hospital_menu/complete_download/export','ExcelReservationController@Export')->name('reservation_export');
//予約情報インポート用のエクセルダウンロード
Route::get('hospital_menu/complete_download/export_for_import_excel','ExcelReservationController@ExportForImportDefault')->name('reservation_import_excel');
//予約情報をインポート
Route::post('hospital_menu/complete_download/import','ExcelReservationController@Import')->name('reservation_import');

//患者情報エクセル　ダウンロードビューページ
Route::get('hospital_menu/complete_download_pt_data','ExcelPtDataController@DownloadReservation');
//患者情報をエクスポート
Route::get('hospital_menu/complete_download_pt_data/export','ExcelPtDataController@Export')->name('pt_data_export');
//患者情報インポート用のエクセルダウンロード
Route::get('hospital_menu/complete_download_pt_data/export_for_import_excel','ExcelPtDataController@ExportForImportDefault')->name('pt_data_import_excel');
//患者情報をインポート
Route::post('hospital_menu/complete_download_pt_data/import','ExcelPtDataController@Import')->name('pt_data_import');

//全科共通予約画面設定のページへ
Route::get('hospital_menu/Common_reservation_setting_screen','HospitalController@CommonReservationSettingScreen');
Route::post('hospital_menu/Common_reservation_setting_screen','HospitalController@CommonReservationSettingScreen');
//予約期限・期間のページへ
Route::get('common_reservation_setting_screen/set_period_and_deadline','CommonSettingScreenController@SetPeriodAndDeadline');

//全科共通の休診日設定(日付指定か隔週か選択)
Route::get('common_reservation_setting_screen/choice_horiday_setting','CommonSettingScreenController@HoridaySetChoice');
//全科共通の休診日設定(隔週で休日を追加)
Route::get('common_reservation_setting_screen/horiday_setting','CommonSettingScreenController@HoridaySetting');
//全科共通の休診日設定(日付指定で休日を追加)
Route::get('/common_reservation_setting_screen/date_specification_horiday_setting_all_department','CommonSettingScreenController@DateSpecificationHolidaySetAllDepartment');
Route::post('/common_reservation_setting_screen/date_specification_horiday_setting_all_department','CommonSettingScreenController@PostDateSpecificationHolidaySetAllDepartment');
Route::delete('/common_reservation_setting_screen/date_specification_horiday_setting_all_department','CommonSettingScreenController@DeleteHolidaySet');
//全科共通開院・休憩・閉診設定
Route::get('common_reservation_setting_screen/opening_rest_closing_time','CommonSettingScreenController@OpeningRestClosingTime');
//設定完了　全科共通開院・休憩・閉診設定
Route::post('opening_rest_closing_time/complete_set_opening_rest_closing_time','CommonSettingScreenController@CompleteOpeningRestClosingTime');

//全科共通の予約数設定
Route::get('common_reservation_setting_screen/number_of_reservation_screen
','CommonSettingScreenController@NumberOfReservationScreen');
//全科共通の予約状況表示数設定
Route::post('common_reservation_setting_screen/status_display_setting
','CommonSettingScreenController@StatusDisplaySetting');
//全科共通の予約数・状況表示設定完了画面
Route::post('common_reservation_setting_screen/number_of_reservation/status_display/complete
','CommonSettingScreenController@CompleteNumberAndStatusSetting');


//診療不可設定
//個別診療科設定メニュー画面へ
Route::get('common_reservation_setting_screen/individual_setting_menu
','IndividualSettingMenuController@IndividualSettingMenu');
//新規診療科設定画面へ
Route::get('individual_setting_menu/add_new_department
','IndividualSettingMenuController@AddNewDepartment');
//新規診療科設定　完了画面
Route::post('individual_setting_menu/complete_add_new_department
','IndividualSettingMenuController@CompleteAddNewDepartment');
//診療科削除の検索画面へ
Route::get('individual_setting_menu/search_delete_department
','IndividualSettingMenuController@SearchDeleteDepartment');
//診療科削除の完了画面へ
Route::post('/individual_setting_menu/complete_delete_department
','IndividualSettingMenuController@CompleteDeleteDepartment');
//個別診療科開院等設定変更の検索画面へ
Route::get('/individual_setting_menu/search_individual_change_department','IndividualSettingMenuController@IndividualChangeDepartment');
//個別診療科開院等設定変更の設定画面へ
Route::post('/individual_setting_menu/set_individual_change_department','IndividualSettingMenuController@SetIndividualChangeDepartment');
//個別診療科開院等設定完了の設定画面へ
Route::post('/individual_setting_menu/complete_individual_change_department','IndividualSettingMenuController@CompleteIndividualChangeDepartment');

//個別診療科予約可能枠に関する設定の検索画面へ
Route::get('/individual_setting_menu/search_department_possible_number','IndividualSettingMenuController@SearchDepartmentPossibleNumber');
//個別診療科予約可能数の設定へ
Route::post('/individual_setting_menu/number_of_reservation_screen','IndividualSettingMenuController@NumberOfReservationScreen');
//個別診療科の予約状況表示数設定
Route::post('/individual_setting_menu/individual_status_display_setting','IndividualSettingMenuController@IndividualStatusDisplaySetting');
//個別診療科の予約数・状況表示設定完了画面
Route::post('/individual_setting_menu/number_of_reservation/status_display/complete','IndividualSettingMenuController@CompleteNumberAndStatusSetting');




//個別の休診日設定(診療科を選択)
Route::get('/individual_setting_menu/search_departmen_horiday_setting','IndividualSettingMenuController@SelectDepartmentHolidaySet');
//個別の休診日設定(日付指定か隔週か選択)
Route::post('/individual_setting_menu/choice_horiday_setting','IndividualSettingMenuController@HolidaySetIndividualChoice');
//個別の休診日設定(隔週で休日を追加)
Route::post('/individual_setting_menu/choice_horiday_setting/week_horiday_setting','IndividualSettingMenuController@WeekHolidaySetIndividualChoice');
//個別の休診日設定(日付指定で休日を追加)
Route::post('/individual_setting_menu/choice_horiday_setting/date_specification_horiday_setting','IndividualSettingMenuController@DateSpecificationHolidaySetIndividualChoice');
//個別の休診日設定で削除ボタンが押された場合(日付指定で休日を追加)
Route::delete('/individual_setting_menu/choice_horiday_setting/date_specification_horiday_setting','IndividualSettingMenuController@DeleteHolidaySet');


//患者情報編集のページへ
Route::get('hospital_menu/patient_registration_change_deletion','HospitalController@PatientRegistrationChangeDeletion');
//新規患者情報登録のページへ
Route::get('patient_registration_change_deletion/new_patient_registration','PatientRegistrationController@NewPatient');
//新規登録完了のページへ
Route::post('patient_registration_change_deletion/complete_new_patient','PatientRegistrationController@CompleteNewPatient');

//患者情報変更の検索ページへ
Route::get('patient_registration_change_deletion/search_change_patient_information','PatientRegistrationController@SearchChangePatient');
//患者情報変更ID検索後、詳細入力
Route::post('change_patient_information/change_patient_information','PatientRegistrationController@ChangePatient');
//患者情報変更完了
Route::post('change_patient_information/complete_change_patient_information','PatientRegistrationController@CompleteChangePatient');


//患者情報削除の検索ページへ
Route::get('patient_registration_change_deletion/search_delete_patient_information','PatientRegistrationController@SearchDeletePatient');
//患者情報削除のページへ
Route::post('patient_registration_change_deletion/delete_patient_information','PatientRegistrationController@DeletePatient');
//患者情報削除完了のページへ
Route::post('patient_registration_change_deletion/complete_delete_patient_information','PatientRegistrationController@CompleteDeletePatient');

//削除用パスワード設定のページへ
Route::get('patient_registration_change_deletion/delete_password_patient_change','PatientRegistrationController@ChangePass');


//患者予約情報編集のページへ
Route::get('hospital_menu/edit_patient_appoimtment_information','HospitalController@EditPatientAppoimtmentInformation');

//予約新規追加の患者検索のページへ
Route::get('edit_patient_appoimtment_information/search_pt_new_reservation','ApointmentEditController@SearchPtNewReservation');
//予約新規追加の患者情報確認画面のページへ
Route::post('edit_patient_appoimtment_information/new_reservation','ApointmentEditController@NewReservation');
//予約削除　情報確認画面のページへ
Route::post('edit_patient_appoimtment_information/delete_reservation','ApointmentEditController@DeleteReservationStatus');
//予約削除完了ページ
Route::post('edit_patient_appoimtment_information/complete_delete_reservation','ApointmentEditController@CompleteDeleteReservation');
//予約診療科選択画面
Route::post('edit_patient_appoimtment_information/select_department_reservation','ApointmentEditController@SelectDepartmentReservation');
//予約診療科日付選択(カレンダー選択)
Route::post('edit_patient_appoimtment_information/select_date_reservation','ApointmentEditController@SelectDateReservation');
//カレンダー選択⇒時間選択(スケジュール)
Route::post('edit_patient_appoimtment_information/select_time_reservation','ApointmentEditController@SelectTimeReservation');
//時間選択(スケジュール)⇒予約完了画面
Route::post('edit_patient_appoimtment_information/complete_add_reservation','ApointmentEditController@CompleteAddReservation');
//予約完了画面⇒紹介状入力画面
Route::post('edit_patient_appoimtment_information/registration_letter_of_introduction','ApointmentEditController@RegistrationLetterOfIntroduction');
//紹介状登録完了
Route::post('edit_patient_appoimtment_information/complete_letter_of_introduction','ApointmentEditController@CompleteLetterOfIntroduction');


//予約状況確認のページへ
Route::get('edit_patient_appoimtment_information/check_reservation_status','ApointmentEditController@CheckReservationStatus');
//直接日付入力による確認画面
Route::post('edit_patient_appoimtment_information/target_date_all_reservation_check','ApointmentEditController@TargetDateAllReservationCheck');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return redirect('/home'); });
 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

 
/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/

//初期状態
Route::group(['prefix' => 'admin'], function() {
   
    Route::get('/',         function () { return redirect('/admin/index'); });    
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

 
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/

//初期状態
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});
