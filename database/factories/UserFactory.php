<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\user\post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->word,
        'slug' =>  $faker->word ,
        'body' => implode($faker->paragraphs($nb = 30) , ','),
    ];
});

$factory->define(App\Model\user\category::class, function (Faker $faker) {
    return [
        'name' => implode($faker->words(3 ) , ' '),
        'slug' =>  $faker->word ,
    ];
});

$factory->define(App\Model\user\post_tag::class, function (Faker $faker) {
    return [
        'post_id' => rand(1,50),
        'tag_id' =>  rand(1,50) ,
    ];
});


$factory->define(App\Model\user\tag::class, function (Faker $faker) {
    return [
        'name' => implode($faker->words(3 ) , ' '),
        'slug' =>  $faker->word ,
    ];
});
