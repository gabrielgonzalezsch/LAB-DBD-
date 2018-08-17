<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

		$this->call(aeropuertos_seeders::class);
        $this->call(autos_seeders::class);
        $this->call(hoteles_seeders::class);
        $this->call(habitaciones_seeders::class);
        $this->call(usuarios_seeders::class);
        $this->call(vuelos_seeders::class);

    }
}
