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
    static $password;
    static $email;

    return [
        'name' => $faker->name,
        'email' => $email ?: $email='admin@example.com',
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $admin_id;

    return [
        'admin_id' => $admin_id ?: $admin_id = 1,
    ];
});



$factory->define(App\Form::class, function (Faker\Generator $faker) {
    static $admin_id;
    return [
        'admin_id' => $admin_id ?: $admin_id = 1,
        'title' => $faker->numerify('Form ###'),
    ];

});

$factory->define(App\Test::class, function (Faker\Generator $faker) {
    static $admin_id;
    return [
        'admin_id' => $admin_id ?: $admin_id = 1,
        'title' => $faker->numerify('Test ###'),
    ];

});
