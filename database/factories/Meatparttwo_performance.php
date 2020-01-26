<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Parttwo_performance;
use Faker\Generator as Faker;

$factory->define(Parttwo_performance::class, function (Faker $faker) {
    return [
        "code" => 309,
        "opportunity" =>$faker->sentence,
       "exceptional_tasks_perfomed"  =>$faker->sentence,
       "results_achieved" => $faker->sentence,
       "meatparttwo_id" => 1
    ];
});
