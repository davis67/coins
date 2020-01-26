<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Performance_metrics_details;
use Faker\Generator as Faker;

$factory->define(Performance_metrics_details::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence,
        'measurement' => $faker->sentence,
        'target_performance' => 5,
        "meatpartone_id" => rand(1, 4)
    ];
});
