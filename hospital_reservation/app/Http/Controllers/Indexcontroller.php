<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
    public function index(){
        return view('index');
    }


    public function hospital_index(){
        return view('hospital_index');
    }
}
