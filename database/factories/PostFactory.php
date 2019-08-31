<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;


$factory->define(Post::class, function (Faker $faker) {
    $user_ids = \DB::table('users')->select('id')->get();
    $user_id = $faker->randomElement($user_ids)->id;
    return [
        'Title' => $faker->title,
        'Body' => $faker->paragraph,
        'user_id'=>$user_id,
    ];
});
