<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('usuarios')->insert(array(
          'tipo_usuario'=>'administrador',
          'banco_origen'=>NULL,
          'numero_cuenta_usuario'=>NULL,
          'fondos_disponibles'=>99999999,
          'username'=>'Soul',
          'email'=>'test@abc.com',
          'password'=>'123',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('usuarios')->where('username', '=', 'Soul')->delete();
    }
}
