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
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'parent_id' => mt_rand(null, 5),
        'name' => $faker->words(3, true),
        'description' => $faker->words(5, true),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => mt_rand(1, 100),
        'user_id' => mt_rand(1, 10),
        'title' => $faker->words(4, true),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(6, 20))),
        'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

$factory->define(App\PostImage::class, function (Faker\Generator $faker) {
    return [
        'post_id' => $faker->randomElement(App\Post::all()->lists('id')->toArray()),
        'path' => $faker->imageUrl($width = 640, $height = 480, 'cats', true),
    ];
});

$factory->define(App\State::class, function (Faker\Generator $faker) {
    return [
        'state' => $faker->state,
        'state_abbr' => $faker->stateAbbr,
    ];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {
    return [
        'state_id' => mt_rand(1, 5),
        'city' => $faker->city,
    ];
});