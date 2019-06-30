<?php

use Faker\Generator as Faker;
use App\Material_family;

$factory->define(App\Material_family::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'abbreviation' => $faker->lexify('????'),
    ];
});
