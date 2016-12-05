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

$factory->define(\App\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(4),
        'author_name' => $faker->firstName,
        'author_last_name' => $faker->lastName,
        'pc_in_stock' => random_int(0, 1000),        
        'pages' => random_int(30, 500),        
        'category' => $faker->colorName
    ];
    
    
//                $table->increments('id');
//            $table->string('title');
//            $table->string('author_name');
//            $table->string('author_last_name');
//            $table->integer('pc_in_stock')->unsigned();
//            $table->integer('pages')->unsigned();
//            $table->string('category');
//            $table->timestamps();
    
    
    
    
    
});
