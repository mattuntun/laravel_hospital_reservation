<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\pt_data::class, function (Faker $faker) {
    return [
            //'data_maked_day'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'pt_id'=>$faker->numberBetween(10000,20000),
            'pt_last_name'=>$faker->lastName,
            'pt_name'=>$faker->firstName ,
            'pt_last_name_kata'=>$faker->lastKanaName,
            'pt_name_kata'=>$faker->firstKanaName ,
            'sex'=>$faker->numberBetween(1,2),
            'birthday'=>$faker->dateTimeBetween('-80 years', '-0years')->format('Y-m-d'), 
            'email_adress'=>$faker->email,  
    ];
});
