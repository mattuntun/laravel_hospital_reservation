<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation_data extends Model
{
    protected $table = 'reservation_data';
    protected $guarder =array('No');
    public $timestamps = true;
    protected $fillabele = [
        //'data_maked_day',
        'reservation_date',
        'reservation_time',
        'reservation_department',
        'pt_id',
        'letter_of_introduction',
        'introduction_hp',
        'introduction_hp_tell',
        'introduction_hp_date'
    ];
    
}
