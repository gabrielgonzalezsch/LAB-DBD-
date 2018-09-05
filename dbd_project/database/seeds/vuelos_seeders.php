<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Carbon\Carbon;



class vuelos_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

    	$response = file_get_contents(storage_path() . "/airports.json");
    	$response = json_decode($response);
    	$carbon = new \Carbon\Carbon();



    	for ($i=0; $i < 300 ; $i++) {

    		// $a = random_int(0,3884);
    		// $b = random_int(0,3884);
        $a = random_int(0,100);
    	  $b = random_int(0,100);

    		$start = Carbon::create(2018, 1, 25,0,0,0,'America/Santiago');
			//End point of our date range.

			$int = random_int(1,6);
			$end = $start->copy()->addDays($int);



			DB::table('vuelos')->insert([

		   		'nombre_avion'					=> $faker->name,
	            'nombre_aerolinea'				=> $faker->randomElement(['Latam','AirFrance','American Airlines','Lufthansa','Sky','Low','Airways']),
	            'aeropuerto_origen'				=> $response[$a]->code,
	            'aeropuerto_destino'			=> $response[$b]->code,
	            'hora_salida'					=> "2020-02-01 21:05",
	            'hora_llegada'					=> "2020-02-02 21:05",
	            'cap_turista'					=> random_int(150,200),
	            'cap_ejecutivo'					=> random_int(50,100),
	            'cap_primera_clase'				=> random_int(10,30),
	            'cap_equipaje'					=> random_int(18,25),
	            'maletas_por_persona'			=> random_int(1,2),
	            'descuento'						=> random_int(0,20),
	            'valor_turista'					=> random_int(60000,100000),
	            'valor_ejecutivo'				=> random_int(110000,200000),
	            'valor_primera_clase'			=> random_int(220000,500000),
	            'created_at'					=> now(),
				       'updated_at'					=> now()

		   ]);
    	}
    }
}
