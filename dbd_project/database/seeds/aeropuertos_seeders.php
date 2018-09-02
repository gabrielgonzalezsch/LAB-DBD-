<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class aeropuertos_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
    	$response = file_get_contents(storage_path() . "/airports.json");
    	$response = json_decode($response);
    	$fecha = new DateTime();

    	for ($i=0; $i < count($response) ; $i++) { 

    		DB::table('aeropuertos')->insert([
   			
   				'cod_aeropuerto' 	 =>  $response[$i]->code, 
   				'ciudad'			     =>  $response[$i]->city,
   				'pais' 				     =>  $response[$i]->country,
          'latitud'          => $response[$i]->lat,
          'longitud'         => $response[$i]->lon,
   				'created_at'		   =>  now(),
   				'updated_at'		   =>  now()

   			]);
       }
    }
}
