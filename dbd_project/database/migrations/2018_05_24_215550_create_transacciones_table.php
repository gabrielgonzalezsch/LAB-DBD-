<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id_transaccion');
            $table->integer('id_usuario')->references('id_usuario')->on('usuarios');
            $table->bigInteger('monto');
            $table->boolean('ya_cancelado')->nullable()->default(false);
            $table->dateTime('hora_compra');
            $table->Integer('numero_cuenta_compra');
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
        Schema::dropIfExists('transacciones');
    }
}
