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
    $random_department = [
        'サンプル内科',
    ];
    $half_opens = [
        '07:00:00',
        '08:00:00',
        '09:00:00',
        '10:00:00',
    ];
    $half_close = [
        '12:00:00',
        '13:00:00',
        '14:00:00',
    ];

    return [
        //'data_maked_day'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        //'clinical_department'=> $faker->realText($maxNbChars = 20,$indexsize = 1),
        'clinical_department'=> $faker->randomElement($random_department),
        'possible_peoples'=> $faker->numberBetween(1,5),
        'start_time'=> $faker->randomElement($opens),
        'break_time_start'=> $faker->randomElement($break_start),
        'break_time_close'=> $faker->randomElement($break_close),
        'close_time'=> $faker->randomElement($closes),
        'more_than_enough_capacity'=> '60',
        'enough_capacity'=> '30',
        'not_enough_capacity'=> '0',
        'half_open_week'=>$faker->numberBetween(1,5),
        'half_open_start'=>$faker->randomElement($half_opens),
        'half_open_close'=>$faker->randomElement($half_close),

    ];
});
