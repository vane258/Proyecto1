<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    //Se obtiene el nivel del usuario de manera aleatoria
    $level = $faker->numberBetween($min = 1, $max = 1);

    //Se obtiene el sexo de manera aleatoria
    $gender=$faker->numberBetween($min = 0, $max = 1);

    //Si el sexo del usuario es 1 es femenino y 0 es masculino, esto para
    //tener un nombre de persona correspondiente al sexo obtenido
    if($gender==1)
        $first_name = $faker->firstNameFemale;
    else
        $first_name = $faker->firstNamemale;

    //Se obtienen apellidos
    $last_name = $faker->lastName;
    $second_last_name = $faker->lastName;

    //** Caso de que es alumno **//
    $title="";

    //Se genera la matricula con un 1 al principio de la misma
    $username = $faker->numerify('1######');

    return [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'second_last_name' => $second_last_name,
        'type' => $level,
        'email' => $username.$first_name.'@casasguri.com',
        'username' => $username.$first_name,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // "secret" bcrypt
        'email_verified_at' => now(),
        'remember_token' => str_random(10),
    ];
});
