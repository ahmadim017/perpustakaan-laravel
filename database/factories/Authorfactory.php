<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\author;
use Faker\Generator as Faker;

$factory->define(author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
