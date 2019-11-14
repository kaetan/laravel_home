<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->realText($maxNbChars = 200, $indexSize = 5),
        'user_id' => User::all()->random()->id,
    ];
});
