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

//患者情報編集のページへ
Route::get('hospital_menu/patient_registration_change_deletion','HospitalController@PatientRegistrationChangeDeletion');
//新規患者情報登録のページへ
Route::get('patient_registration_change_deletion/new_patient_registration','PatientRegistrationContoroller@NewPatient');
//患者情報変更のページへ
Route::get('patient_registration_change_deletion/change_patient_information','PatientRegistrationContoroller@ChangePatient');
//患者情報削除のページへ
Route::get('patient_registration_change_deletion/delete_patient_information','PatientRegistrationContoroller@DeletePatient');



//患者予約情報編集のページへ
Route::get('hospital_menu/edit_patient_appoimtment_information','HospitalController@EditPatientAppoimtmentInformation');

//予約状況確認のページへ
Route::get('edit_patient_appoimtment_information/check_reservation_status','ApointmentEditController@CheckReservationStatus');



