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

$factory->define(App\Lib::class, function (Faker\Generator $faker) {
    return [
        'isbn' => random_int(100, 999)."-".random_int(10, 99)."-"
                  .random_int(1000, 9999)."-".random_int(100, 999)."-"
                  .random_int(0, 9), 
        'title' => $faker->sentence(4),
        'author_1' => $faker->firstName." ".$faker->lastName,
        'author_2' => $faker->firstName." ".$faker->lastName,
        'publisher' => $faker->company,        
        'year' => random_int(1930, 2016),
        'price' => random_int(0, 500).".".random_int(0, 99)
    ];    
});
