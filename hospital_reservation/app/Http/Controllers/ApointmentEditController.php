<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApointmentEditController extends Controller
{
    //全科共通予約画面設定へのアクション
    public function CheckReservationStatus() {
        return view('hospital_view.CheckReservationStatus');
    }


}
