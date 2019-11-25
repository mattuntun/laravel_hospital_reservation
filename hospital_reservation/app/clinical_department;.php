<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clinical_department extends Model
{
    protected $table = 'clinical_department';
    protected $guarded = array('No');
    public $timestamps = true;
    protected $fillable = [
        'data_maked_day',
        'clinical_department',
        'possible_peoples',
        'start_time',
        'break_time_start',
        'break_time_close',
        'close_time',
    ];
}
