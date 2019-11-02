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
Route::get('index','Indexcontroller@index');


//病院indexページへ
Route::post('index/hospital_index','Indexcontroller@hospital_index');

//病院indexページへ
Route::get('index/hospital_index','Indexcontroller@hospital_index');

    //全科共通予約画面設定のページへ
    Route::get('hospital_view/Common_reservation_setting_screen','Hospital_view_controller@Common_reservation_setting_screen');

    //患者情報編集のページへ
    Route::get('hospital_view/patient_registration_change_deletion','Hospital_view_controller@patient_registration_change_deletion');

            //新規患者情報登録のページへ
            Route::get('patient_registration_change_deletion/new_patient_registration','Apointment_editcontroller@check_reservation_status');



    //患者予約情報編集のページへ
    Route::get('hospital_view/edit_patient_appoimtment_information','Hospital_view_controller@edit_patient_appoimtment_information');

        //予約状況確認のページへ
        Route::get('edit_patient_appoimtment_information/check_reservation_status','Apointment_editcontroller@check_reservation_status');



