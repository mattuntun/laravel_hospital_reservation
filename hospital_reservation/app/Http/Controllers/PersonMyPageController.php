<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonMyPageController extends Controller
{
    public function DeleteMyReservations(){
        return view('patient_menu.delete_my_data_reservation');
    }
}
