<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class choferes_seeders extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
       

    	function frand3($min, $max, $decimals = 0) {
			$scale = pow(10, $decimals);
			return mt_rand($min * $scale, $max * $scale) / $scale;
	  	}


    	$response = file_get_contents(storage_path() . "/airports.json");
    	$response = json_decode($response);



		for ($i=0; $i < 100 ; $i++) {

			for($j=0; $j < 5  ; $j++){


				DB::table('choferes')->insert([

			        'name'					=>	$faker->name,
					'capacidad_auto' 		=>  random_int(2,6),
					'patente'				=>  strtoupper(str_random(6)),
					'pais'			 		=>	$response[$i]->country, 
					'ciudad'		 		=>  $response[$i]->city,
					'tarifa_por_kilometro'	=>	random_int(600,1000), 
					'valorizacion'			=> 	frand(3, 5, 1),
					'created_at'			=>now(),
					'updated_at'			=>now(),

				]);
			}
		}
    }
}
