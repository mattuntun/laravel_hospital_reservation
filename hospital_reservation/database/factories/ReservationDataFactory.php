<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Reservation_data::class, function (Faker $faker) {
    $ptIds = App\pt_data::pluck('pt_id')->all();
    $reservationDepartments = App\clinical_departments::pluck('clinical_department')->all();
    
    $sample_days = [
        '20200701',
        '20200702',
        '20200703',
    ];
    $sample_times = [
        '09:00:00',
        '10:00:00',
        '11:00:00',
        '12:00:00',
    ];
    $department = [
        'サンプル内科',
        
    ];


    return [
            //'data_maked_day'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            //'reservation_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'reservation_date'=>$faker->randomElement($sample_days) ,
            //'reservation_time'=>$faker->time($format = 'H:i:s', $max = 'now'),
            'reservation_time'=>$faker->randomElement($sample_times),
            //'reservation_department'=>$faker->randomElement($reservationDepartments),
            'reservation_department'=>$faker->randomElement($department),
            'pt_id'=>$faker->randomElement($ptIds),
            'letter_of_introduction'=>$faker->numberBetween(1,2),
            'introduction_hp'=>$faker->realText($maxNbChars = 20,$indexsize = 1),
            'introduction_hp_tell'=>$faker->phoneNumber, 
            'introduction_hp_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),  
    ];
});

