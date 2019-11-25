<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\clinical_department::class, function (Faker $faker) {
    return [
        'data_maked_day'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'clinical_department'=> $faker->realText($maxNbChars = 20,$indexsize = 1),
        'possible_peoples'=> $faker->numberBetween(1,100),
        'start_time'=> $faker->time($format = 'H:i:s', $max = 'now'),
        'break_time_start'=> $faker->time($format = 'H:i:s', $max = 'now'),
        'break_time_close'=> $faker->time($format = 'H:i:s', $max = 'now'),
        'close_time'=> $faker->time($format = 'H:i:s', $max = 'now'),
    ];
});
