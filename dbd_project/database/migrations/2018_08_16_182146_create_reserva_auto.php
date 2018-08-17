<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaAuto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reserva_auto', function(Blueprint $table){
        $table->increments('id_reserva_auto');
        $table->integer('id_transaccion')->references('id_transaccion')->on('transacciones');
        $table->integer('id_auto')->references('id_auto')->on('autos');
        $table->dateTime('hora_reserva');
        $table->date('inicio_reserva');
        $table->date('fin_reserva');
        $table->smallInteger('num_dias');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_auto');
    }
}
