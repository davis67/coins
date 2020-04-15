<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Opportunity;
use Faker\Generator as Faker;

$factory->define(Opportunity::class, function (Faker $faker) {
    return [
        'opportunity_name' => $faker->text,
        'country' => $faker->country,
        'revenue' => $faker->randomDigit(4),
        'type' => $faker->text,
        'clients_name' => $faker->name,
        'lead_source' => $faker->text,
        'sales_stage' => $faker->text,
        'external_deadline' => $faker->iso8601($max = 'now'),
        'internal_deadline' => $faker->iso8601($max = 'tommorrow'),
        'funder' => $faker->text
    ];
});
