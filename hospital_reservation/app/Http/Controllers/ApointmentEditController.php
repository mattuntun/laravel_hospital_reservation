<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApointmentEditController extends Controller
{
    //予約新規追加のコントローラ
    public function NewReservation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.new_reservation');
    }

    //予約削除のコントローラ
    public function DeleteReservation() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.delete_reservation');
    }

    //予約状況確認のコントローラ
    public function CheckReservationStatus() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation_status');
    }

    //予約状況確認(患者別)のコントローラ
    public function CheckReservationPatient() {
        return view('hospital_menu.edit_patient_appoimtment_information.edit_reservation.check_reservation.check_reservation_patient');
    }


}
