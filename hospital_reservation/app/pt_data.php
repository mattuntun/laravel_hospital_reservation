<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pt_data extends Model
{
    protected $table = 'pt_data';
    protected $guarded = array('No');
    public $timestamps = true;
    protected $fillable = [
        'data_maked_day',
        'pt_id',
        'pt_last_name',
        'pt_name',
        'pt_last_name_kata',
        'pt_name_kata',
        'sex',
        'birthday',
        'email_adress',
    ];

}
