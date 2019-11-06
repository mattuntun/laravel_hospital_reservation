<?php

//編集中

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientRegistrationContoroller extends Controller
{
    //編集中
    public function check_reservation_status() {
        return view('hospital_view.check_reservation_status');
    }


}
