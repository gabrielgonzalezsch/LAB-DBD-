<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraHabitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('compra_habitacion', function(Blueprint $table){
        $table->increments('id_compra_habitacion');
        $table->integer('id_transaccion')->references('id_transaccion')->on('transacciones');
        $table->integer('id_habitacion')->references('id_habitacion')->on('habitaciones');
        $table->dateTime('hora_reserva');
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
        Schema::dropIfExists('compra_habitacion');
    }
}
