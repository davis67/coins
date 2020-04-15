<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $firstName = $faker->firstName();
    return [
        'team_name' => $firstName . ' Consulting Services',
        'team_code' => strtoupper($firstName),
        'team_leader' => factory(User::class)->create()->id
    ];
});
