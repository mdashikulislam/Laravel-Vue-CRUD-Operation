<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Information;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'fname'=>$faker->firstName,
        'lname'=>$faker->lastName,
        'email'=>$faker->email,
        'phone'=>'01'.$faker->randomNumber(9),
        'gender'=>'female',
        'hobbies'=>$faker->company,
        'bio'=>'String data, right truncated: 1406 Data too long for column  at row 1 (SQL: insert into `information fname`, `lname`, `email`, `phone`, `gender`,'
    ];
});
