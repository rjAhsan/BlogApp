<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostCatagorie;
use Faker\Generator as Faker;

$factory->define(PostCatagorie::class, function (Faker $faker) {
    return [
           'post_id'=>\App\Post::all()->random()->id,
           'catagorie_id'=>\App\Catagorie::all()->random()->id

        ];
});
