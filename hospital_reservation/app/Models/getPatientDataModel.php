<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class getPatientDataModel extends Model
{
    protected $table = 'pt_data';
    protected $guarded = array('No');

    public static function getPtData($search_pt_id){
        $ptData = DB::table('pt_data')->where('pt_id',$search_pt_id)->get();
        return $ptData;
    }

  
}
