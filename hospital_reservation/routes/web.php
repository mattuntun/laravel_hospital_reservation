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

Route::get('/', function () {
return view('welcome');
});

//indexページへ
Route::get('index','Indexcontroller@Index');

//患者マイページへ
Route::post('index/mypage_menu','IndexController@MyPageMenu');
//患者マイページから予約削除
Route::post('mypage/delete_my_data_reservation','PersonMyPageController@DeleteMyReservations');
//患者マイページから予約削除完了
Route::post('mypage/complete_delete_my_data_reservation','PersonMyPageController@CompleteDeleteMyReservation');


//病院menuページへ
Route::post('index/hospital_menu','IndexController@HospitalMenu');
//病院menuページへ
Route::get('index/hospital_menu','IndexController@HospitalMenu');

//全科共通予約画面設定のページへ
Route::get('hospital_menu/Common_reservation_setting_screen','HospitalController@CommonReservationSettingScreen');
Route::post('hospital_menu/Common_reservation_setting_screen','HospitalController@CommonReservationSettingScreen');
//予約期限・期間のページへ
Route::get('common_reservation_setting_screen/set_period_and_deadline','CommonSettingScreenController@SetPeriodAndDeadline');
//全科共通の休診日設定
Route::get('common_reservation_setting_screen/horiday_setting','CommonSettingScreenController@HoridaySetting');
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
//診療不可設定
//個別診療科設定メニュー画面へ
Route::get('common_reservation_setting_screen/individual_setting_menu
','IndividualSettingMenuController@IndividualSettingMenu');
Route::get('individual_setting_menu/add_new_department
','IndividualSettingMenuController@AddNewDepartment');

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


//予約削除のページへ
Route::get('edit_patient_appoimtment_information/deretereservation','ApointmentEditController@DeleteReservation');
//予約状況確認のページへ
Route::get('edit_patient_appoimtment_information/check_reservation_status','ApointmentEditController@CheckReservationStatus');
//予約状況確認(患者別)のページへ
Route::get('check_reservation_status/patient','ApointmentEditController@CheckReservationPatient');



