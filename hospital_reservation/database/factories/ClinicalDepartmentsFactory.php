<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\clinical_departments::class, function (Faker $faker) {
    $opens = [
        '07:00:00',
        '08:00:00',
        '09:00:00',
        '10:00:00',
    ];
    $closes = [
        '17:00:00',
        '18:00:00',
        '19:00:00',
        '20:00:00',
        '21:00:00',
    ];

    $break_start = [
        '12:00:00',
        '13:00:00',
    ];
    $break_close = [
        '13:00:00',
        '14:00:00',
    ];

    return [
        'data_maked_day'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'clinical_department'=> $faker->realText($maxNbChars = 20,$indexsize = 1),
        'possible_peoples'=> $faker->numberBetween(1,100),
        'start_time'=> $faker->randomElement($opens),
        'break_time_start'=> $faker->randomElement($break_start),
        'break_time_close'=> $faker->randomElement($break_close),
        'close_time'=> $faker->randomElement($closes),
    ];
});
