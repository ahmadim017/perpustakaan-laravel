<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\book;
use Faker\Generator as Faker;
use App\author;

$factory->define(book::class, function (Faker $faker) {

    $randomNumber = rand(1,100);
    $cover = "https://picsum.photos/id/{$randomNumber}/200/300";

    return [
        'author_id' => author::inRandomOrder()->first()->id,
        'tittle' => $faker->sentence(4),
        'deskripsi' => $faker->sentence(50),
        'cover' => $cover,
        'qty' => rand(10,20),
        
    ];
});
