<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class usuarios_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  	
    	factory(App\Models\Usuarios::class, 10)->create();
    }
}
