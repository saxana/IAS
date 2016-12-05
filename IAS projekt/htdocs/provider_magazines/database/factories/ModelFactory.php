<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Magazine::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(4),
        'number' => random_int(1, 12)."/".random_int(1950, 2016),
        'year' => random_int(1950, 2016),
        'price' => random_int(0, 500).".".random_int(0, 99),
    ];
});
