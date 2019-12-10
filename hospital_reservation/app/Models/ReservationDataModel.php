<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservationDataModel extends Model
{
    protected $tables = 'reservation_data';
    protected $guarded = array('No');

    public static function SearchReservation($search_pt_id){
        $reservationDatas = DB::table('reservation_data')->where('pt_id' ,$search_pt_id)->get();
        return $reservationDatas;
    }
  
    
}
