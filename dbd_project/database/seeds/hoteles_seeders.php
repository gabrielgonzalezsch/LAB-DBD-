<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class hoteles_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

    	function frand($min, $max, $decimals = 0) {
  			$scale = pow(10, $decimals);
  			return mt_rand($min * $scale, $max * $scale) / $scale;
		}


    	$response = file_get_contents(storage_path() . "/airports.json");
    	$response = json_decode($response);


    	/*$client = new Client();
    	$latlong = $response[$i]->lat+$response[$i]->lon;
	    $res = $client->get('http://maps.googleapis.com/maps/api/geocode/json?latlng='+$latlong+'&sensor=true');
	    echo $res->getStatusCode(); // 200
	    return $res->getBody();


	    echo $res->getBody();*/

    	for ($i=0; $i < 400 ; $i++) {

    		DB::table('hoteles')->insert([

	            'nombre_hotel'					    => $faker->name,
	            'pais'							        => $response[$i]->country,
	            'ciudad'						        => $response[$i]->city,
	            'direccion'						      => $faker->address,		//Direccion api
	            'valoracion'					      => frand(1, 5, 1),
	            'num_valoraciones'			    => random_int(0,500),
	            'num_comentarios'				    => random_int(0,50),
	            'latitud'						        => $response[$i]->lat,
	            'longitud'						      => $response[$i]->lon,
	            'habitaciones_disponibles'	=> 0,
	            'precio_min_habitacion'			=> random_int(50000,300000),
	            'created_at'					      => now(),
   				'updated_at'					          => now()

   			]);
       	}

    }
}
