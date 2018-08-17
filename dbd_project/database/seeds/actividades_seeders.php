<?php

use Illuminate\Database\Seeder;

class actividades_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

    	for ($i=0; $i < count($response) ; $i++) { 








    		DB::table('actividad')->insert([
   			
   				'created_at'		   		=>  now(),
   				'updated_at'		   		=>  now(),



   				'nombre_actividad'	    	=>	$faker->randomElement(['Trekking','Visitar Museos','Teleferico','','']),
   				'descripcion_actividad' 	=>	'-',


   				'fecha_inicio'				=>  
   				'fecha_fin'					=> 

   				'pais' 				     	=>  $response[$i]->country,
   				'ciudad'			     	=>  $response[$i]->city,
   				'calle'						=> 	$faker->address,
   				'valor_entrada'				=> 	random_int(),
   				'cupos'						=>  random_int(20,35),
   				'descuento'					=>	random_int(0,20),
   				'precio_normal'				=>
   				
   				

   			]);





















    }
}
