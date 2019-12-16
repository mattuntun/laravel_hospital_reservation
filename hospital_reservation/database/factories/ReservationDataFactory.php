<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Reservation_data::class, function (Faker $faker) {
    $ptIds = App\pt_data::pluck('pt_id')->all();
    $reservationDepartments = App\clinical_departments::pluck('clinical_department')->all();
    
    return [
            //'data_maked_day'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'reservation_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'reservation_time'=>$faker->time($format = 'H:i:s', $max = 'now'),
            'reservation_department'=>$faker->randomElement($reservationDepartments),
            'pt_id'=>$faker->randomElement($ptIds),
            'letter_of_introduction'=>$faker->numberBetween(1,2),
            'introduction_hp'=>$faker->realText($maxNbChars = 20,$indexsize = 1),
            'introduction_hp_tell'=>$faker->phoneNumber, 
            'introduction_hp_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),  
    ];
});

