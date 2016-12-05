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

$factory->define(\App\Ksiazka::class, function (Faker\Generator $faker) {
    return [
        'tytul' => $faker->sentence(4),
        'autorzy' => $faker->firstName." ".$faker->lastName,
        'opis' => $faker->sentences(random_int(4,8), true),
        'jest_dostepne' => random_int(0, 1),
        'strony' => random_int(30, 500),
        'wydawca' => $faker->company
    ];
});
