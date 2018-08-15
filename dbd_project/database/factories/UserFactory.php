<?php

use Faker\Generator as Faker;
use App\Models\Usuarios;
use App\Models\Aeropuertos;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Usuarios::class, function (Faker $faker) {
    
    $array = [

        'username'              => $faker->username,
        'email'                 => $faker->email,
        'password'              => $faker->password,
        'tipo_usuario'          => $faker->randomElement(['Administrador','Invitado']),
        'banco_origen'          => $faker->randomElement(['Santander','Bci','Itau','Banco Estado','Bancho De Chile','Scotiabank']),
        'numero_cuenta_usuario' => random_int(100000000,999999999),
        'fondos_disponibles'    => random_int(0,500),
        'remember_token'        => str_random(10)
    ];

    return $array;
});


/*$factory->define(Aeropuertos::class, function (Faker $faker) {
    
    

    //print($i);
    //$i = random_int(0,1000);  

    //$i = range(1, 20);
    //shuffle($i);

    $array = [


            'cod_aeropuerto' =>  $response[random_int(0,3)]->codeIataAirport,
            'ciudad'         =>  $response[random_int(0,3)]->codeIataCity,
            'pais'           =>  $response[random_int(0,3)]->codeIso2Country,
    
    ];

    
    return $array;
});*/
