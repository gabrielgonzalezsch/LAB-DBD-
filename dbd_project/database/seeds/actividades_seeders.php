<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Carbon\Carbon; 

class actividades_seeders extends Seeder
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
   


    	$period = Carbon::create(2018, 1, 31);


    	for ($i=0; $i < count($response) ; $i++) { 


    		DB::table('actividad')->insert([
   			
   				

   				'nombre_actividad'	    	=>	$faker->randomElement(['Trekking','Visitar Museos','Teleferico','Escalada','Rafting','Viaje en Bote']),
   				'descripcion_actividad' 	=>	'-',

   				'fecha_inicio'				=> 	$period,
   				'fecha_fin'					=> 	$period,
   				'pais' 				     	=>  $response[$i]->country,
   				'ciudad'			     	=>  $response[$i]->city,
   				'calle'						=> 	$faker->address,
   				'valor_entrada'				=> 	random_int(20000,40000),
   				'cupos'						=>  random_int(20,35),
   				'descuento'					=>	random_int(0,20),
   				'created_at'		   		=>  now(),
   				'updated_at'		   		=>  now(),
   				
   			]);
   		}
    }
}
