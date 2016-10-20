<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Experiment;
use App\Models\Form;
use App\Models\Test;
use App\Models\Point;
use App\Models\Route;
use App\Models\Segment;
use App\Models\Instruction;
use Faker\Generator;

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

$factory->define(User::class, function (Faker\Generator $faker)
{
    static $password;
    return [
        'username' => $faker->firstName,
        'email' => $faker->email,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Admin::class, function (Faker\Generator $faker)
{
    return [

    ];
});

$factory->defineAs(Admin::class, 'superuser', function () use ($factory)
{
    $admin = $factory->raw(Admin::class);
    return array_merge($admin, ['superuser' => true]);
});

$factory->define(Guest::class, function (Faker\Generator $faker)
{
    return [

    ];
});

$factory->define(Experiment::class, function (Faker\Generator $faker)
{
    return [
        'subject' => $faker->bothify('Experiment ##??'),
        'description' => $faker->text($maxNbChars = 200),
    ];
});

$factory->define(Form::class, function (Faker\Generator $faker)
{
    return [
        'title' => $faker->numerify('Form ###'),
    ];
});

$factory->define(Test::class, function (Faker\Generator $faker)
{
    return [
        'title' => $faker->numerify('Test ###'),
    ];
});

$factory->define(Point::class, function (Faker\Generator $faker)
{
    return [
        'longitude' => $faker->longitude($min = -180, $max = 180),
        'latitude' => $faker->latitude($min = -90, $max = 90),
        'title' => $faker->numerify('Point ###')
    ];
});

$factory->define(Route::class, function (Faker\Generator $faker)
{
    $points = Point::all()->shuffle();
    return [
        'origin_id' => $points->pop()->id,
        'destination_id' => $points->pop()->id,
    ];
});


$factory->define(Segment::class, function (Faker\Generator $faker)
{
    $points = Point::all()->shuffle();
    return [
        'start_id' => $points->first()->id,
        'end_id' => $points->last()->id,
        'distance'=> $faker->numberBetween($min = 0, $max = 1000),
        'duration' => $faker->numberBetween($min = 0, $max = 1000),
    ];
});

$factory->define(Instruction::class, function (Faker\Generator $faker)
{
    return [
        'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
