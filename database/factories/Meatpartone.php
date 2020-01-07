<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meatpartone;
use Faker\Generator as Faker;

$factory->define(App\Meatpartone::class, function (Faker $faker) {
    return [
        'part' => 1,
        "performance_dimension" => $faker->text,
        "weight" => 25
    ];
});
