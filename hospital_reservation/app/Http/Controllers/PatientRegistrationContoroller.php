<?php

//編集中

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientRegistrationContoroller extends Controller
{
    //編集中
    public function NewPatient() {
        return view('hospital_menu.new_patient_registration');
    }


}
