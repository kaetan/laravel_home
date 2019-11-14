<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 30, $indexSize = 5),
        'text' => $faker->text(500),
    ];
});
