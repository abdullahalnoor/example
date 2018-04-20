<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->word,
        'category_description' => $faker->text($maxNbChars = 200),
        'publication_status' => $faker->boolean()
    ];
});
