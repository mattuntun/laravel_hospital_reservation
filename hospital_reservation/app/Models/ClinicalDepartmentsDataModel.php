<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClinicalDepartmentsDataModel extends Model
{
    protected $table = 'clinical_departments';
    protected $primaryKey ='No';
    protected $guarded = array('No');

    public static function GetDepartmentsData(){
         $getDepartments = DB::table('clinical_departments')->get();
        return $getDepartments;
    }

    public static function AllTimeChenge($changeTimes){
        
        $newTimes = ClinicalDepartmentsDataModel::all();
        foreach($newTimes as $newTime){
            $newTime->start_time = $changeTimes['open_time'];
            $newTime->close_time = $changeTimes['close_time'];
            $newTime->break_time_start = $changeTimes['restStart_time'];
            $newTime->break_time_close = $changeTimes['restStop_time'];
            $newTime->save();    
        }

    }


}
