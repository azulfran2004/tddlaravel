<?php

use Faker\Generator as Faker;

$factory->define(App\Profession::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(3),
        'education_level' => $faker->sentence(3),
        'sector' => $faker->sentence(3),
        'salary' => $faker->sentence(3),
        'experience_required' => $faker->sentence(3),

    ];
});
