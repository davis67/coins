<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Performance_metrics_details;
use Faker\Generator as Faker;

$factory->define(Performance_metrics_details::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'measurement' => $faker->paragraph,
        'target_performance' => 5,
        'self_assessment' => rand(1,5),
        'supervisor_assessment' => rand(1,5),
        "meatpartone_id" => rand(1, 4)
    ];
});
