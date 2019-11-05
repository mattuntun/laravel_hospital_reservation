<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApointmentEditController extends Controller
{
    //予約新規追加のコントローラ
    //予約削除のコントローラ

    //予約状況確認のコントローラ
    public function CheckReservationStatus() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation_status');
    }


}
