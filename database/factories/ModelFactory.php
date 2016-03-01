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
        'name' 				=> $faker->name,
        'nickname' 			=> $faker->name,
        'email' 			=> $faker->email,
        'password' 			=> bcrypt('password'),
        'remember_token' 	=> str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->sentence,
        'content'       => $faker->paragraph(rand(20,300)),
        'author_id'     => rand(1,50),
        'category_id'   => 1,
        'image'         => $faker->imageUrl,
    ];
});


$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'body'          => $faker->sentence(rand(20,300)),
        'author_id'     => rand(1,50),
        'post_id'       => rand(1,50),
    ];
});
