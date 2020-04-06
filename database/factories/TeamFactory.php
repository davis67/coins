<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $firstName = $faker->firstName();
    return [
        'team_name' => $firstName . ' Consulting Services',
        'team_code' => strtoupper($firstName),
    ];
});
