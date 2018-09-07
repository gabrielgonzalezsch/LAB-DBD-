<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class paquetes_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        

    	for ($i=0; $i < 500 ; $i++) {

	    	DB::table('paquetes')->insert([

	          
	    		'id_vuelo'				=>	$i+1,
	    		'id_habitacion'			=>	$i+1,
	    		'id_auto'				=>	$i+1,
	    		'tipo_paquete'			=>  2,
	    		'descuento_paquete'		=>	random_int(0,30),
	    		'descripcion'			=>  'Ofertazo de la vida',
	    		'monto'					=>	null


	      	]);

	    }
    }
}
