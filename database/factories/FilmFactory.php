<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modeles\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    return [
        'titre' => $faker->sentence(3, true),
        'anneeSortie' => $faker->year(),
        'description' => $faker->sentence(20, true),
        'categorie_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
