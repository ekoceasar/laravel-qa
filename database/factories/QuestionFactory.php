<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5,10)), "."),//remove the dot at the end of the generated sentence
        'body' => $faker->paragraphs(rand(3,7), true), //true parameter generates a string instead of an array
        'views' => rand(0,10),
        'answers_count' => rand(0,10),
        'votes' => rand(0,10)
    ];
});
