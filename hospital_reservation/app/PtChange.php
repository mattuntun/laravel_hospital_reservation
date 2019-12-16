<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PtChange extends Model
{
    public static function getPtChange($patientData){
        $lastName = DB::table('pt_data')->where('pt_id',$patientData)->value('pt_last_name');
        
        return $lastName;

    }
}
