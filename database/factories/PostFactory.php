<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(\App\Post::class, function (Faker $faker) {

    $title = $faker->asciify('*********************');
    return [
        'title' => $title,
        'content' => $faker->text,
        'status' => 'active',
        'slug'=>Str::slug($title),
        'visible'=>true,
        'thumbnail'=>$faker->imageUrl(),
        'publish_time'=>now()->toDateTimeString(),
        'description'=>$faker->text,
        'author_id'=>0,
        'parent_id'=>0,
        'type'=>'post'
    ];
});
