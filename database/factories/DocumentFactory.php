<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Document;
use App\Models\Opportunity;
use App\User;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'opportunity_id' => factory(Opportunity::class)->create()->id
    ];
});
