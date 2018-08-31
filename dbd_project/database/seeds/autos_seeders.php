<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class autos_seeders extends Seeder
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
    	$responseCars =file_get_contents(storage_path() . "/cars.json");
		$responseCars = json_decode($responseCars);



		for ($i=0; $i < count($responseCars) ; $i++) {
			$str = explode(" ",$responseCars[$i]->Name);
	    	DB::table('autos')->insert([

		            'modelo_auto'					=> ucfirst($str[1]),
		            'compañia'						=> ucfirst($str[0]),
		            'patente'						=> strtoupper(str_random(6)),
		            'pais_arriendo'					=> $response[$i]->country,
		            'ciudad_arriendo'				=> $response[$i]->city,
		            'calle_arriendo'				=> $faker->address,
		            'precio_por_dia'				=> random_int(10000,50000),
		            'cap_pasajeros'					=> random_int(2,6),
		            'descripcion_auto'				=> 'Descripción de prueba',
		            'descuento'						=> random_int(5,20),
		            'created_at'					=> now(),
	   				    'updated_at'					=> now()
	   		]);
		}
    }
}
