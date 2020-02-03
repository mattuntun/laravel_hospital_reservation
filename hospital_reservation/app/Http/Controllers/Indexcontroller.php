<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\PatientDataModel;
//use App\Models\ReservationDataModel;

class Indexcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index() {
        return view('index');
    }

}
