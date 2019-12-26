<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\User;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'text' => $faker->realText($maxNbChars = 500, $indexSize = 5),
        'user_id' => User::all()->random()->id,
    ];
});
