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



//病院menuページへ
Route::post('index/hospital_menu','IndexController@HospitalMenu');
//病院menuページへ
Route::get('index/hospital_menu','IndexController@HospitalMenu');

//全科共通予約画面設定のページへ
Route::get('hospital_menu/Common_reservation_setting_screen','HospitalController@CommonReservationSettingScreen');
//予約期限・期間のページへ
Route::get('common_reservation_setting_screen/set_period_and_deadline','CommonSettingScreenController@SetPeriodAndDeadline');
//全科共通の、休診日設定
Route::get('common_reservation_setting_screen/closed_setting','CommonSettingScreenController@ClosedSetting');


//患者情報編集のページへ
Route::get('hospital_menu/patient_registration_change_deletion','HospitalController@PatientRegistrationChangeDeletion');
//新規患者情報登録のページへ
Route::get('patient_registration_change_deletion/new_patient_registration','PatientRegistrationContoroller@NewPatient');
//患者情報変更のページへ
Route::get('patient_registration_change_deletion/change_patient_information','PatientRegistrationContoroller@ChangePatient');
//患者情報変更ID検索後、詳細入力
Route::post('change_patient_information/change_patient_information_details','PatientRegistrationContoroller@ChangePatientDetails');

//患者情報削除のページへ
Route::get('patient_registration_change_deletion/delete_patient_information','PatientRegistrationContoroller@DeletePatient');
//削除用パスワード設定のページへ
Route::get('patient_registration_change_deletion/delete_password_patient_change','PatientRegistrationContoroller@ChangePass');


//患者予約情報編集のページへ
Route::get('hospital_menu/edit_patient_appoimtment_information','HospitalController@EditPatientAppoimtmentInformation');
//予約新規追加のページへ
Route::get('edit_patient_appoimtment_information/newreservation','ApointmentEditController@NewReservation');
//予約削除のページへ
Route::get('edit_patient_appoimtment_information/deretereservation','ApointmentEditController@DeleteReservation');
//予約状況確認のページへ
Route::get('edit_patient_appoimtment_information/check_reservation_status','ApointmentEditController@CheckReservationStatus');
//予約状況確認(患者別)のページへ
Route::get('check_reservation_status/patient','ApointmentEditController@CheckReservationPatient');



