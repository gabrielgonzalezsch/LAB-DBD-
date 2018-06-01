<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('ID_usuario');
            $table->string('tipo_usuario', 15)->default('invitado');
            $table->string('banco_origen', 30)->nullable();
            $table->smallInteger('numero_cuenta_usuario')->nullable();
            $table->bigInteger('fondos_disponibles')->default(0);
            $table->string('username', 30)->default('guest123');
            $table->string('email', 40)->unique()->nullable();
            $table->string('password', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
