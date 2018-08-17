<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class habitaciones_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

		function frand1($min, $max, $decimals = 0) {
  			$scale = pow(10, $decimals);
  			return mt_rand($min * $scale, $max * $scale) / $scale;
		}




		for ($i=0; $i < 400 ; $i++) {


	        DB::table('habitaciones')->insert([

		   		'id_hotel'						=> $i+1,
	            'num_habitacion'				=> random_int(100,1000),
	            'precio_por_noche'				=> random_int(70000,300000),
	            'ya_reservado'					=> $faker->randomElement(['Y','N']),
	            'valoracion'					=> frand1(1, 5, 1),
	            'descripcion'					=> '-',
	            'incluye_desayuno'				=> $faker->randomElement(['Y','N']),
	            'incluye_aire_acondicionado'	=> $faker->randomElement(['Y','N']),
	            'incluye_servicio'				=> $faker->randomElement(['Y','N']),
	            'num_camas_dobles'				=> random_int(1,3),
	            'num_camas_simples'				=> random_int(1,3),
	            'room_size'						=> random_int(15,40),
	            'descuento'						=> random_int(0,20),
	            'created_at'					=> now(),
				'updated_at'					=> now()

		   ]);
	    }
	}
}
