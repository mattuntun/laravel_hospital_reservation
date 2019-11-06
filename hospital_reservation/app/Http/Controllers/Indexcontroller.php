<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
    public function Index(){
        return view('index');
    }


    public function HospitalMenu(){
        return view('hospital_menu.hospital_menu');
    }
}
