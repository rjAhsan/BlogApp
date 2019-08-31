<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Catagorie;
use Faker\Generator as Faker;

$factory->define(Catagorie::class, function (Faker $faker) {
    return [
        'name'=> $faker->company,
    ];
});
