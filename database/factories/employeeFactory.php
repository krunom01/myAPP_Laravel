<?php

use Faker\Generator as Faker;
use App\employees;

$factory->define(employees::class, function (Faker $faker) {
    return [
        
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->email,
        'workingPlace' =>$faker->randomElement(['coach', 'worker', 'board'])
    ];
});
