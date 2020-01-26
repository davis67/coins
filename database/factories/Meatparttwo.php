<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meatparttwo;
use Faker\Generator as Faker;

$factory->define(Meatparttwo::class, function (Faker $faker) {
    return [
        "part" => "part two",
        "performance_metrix" =>$faker->sentence,

    ];
});
