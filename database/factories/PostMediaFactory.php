<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostMedia;
use Faker\Generator as Faker;

$factory->define(PostMedia::class, function (Faker $faker) {
    return [

        'post_id'=>\App\Post::all()->random()->id,
        'media_id'=>\App\Media::all()->random()->id,

    ];
});
