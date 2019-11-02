<?php

//予約情報編集のコントローラ

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Patient_registrationcontoroller extends Controller
{
    //全科共通予約画面設定へのアクション
    public function check_reservation_status() {
        return view('hospital_view.check_reservation_status');
    }


}
