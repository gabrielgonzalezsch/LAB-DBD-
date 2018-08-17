<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('compra_actividad', function(Blueprint $table){
        $table->increments('id_compra_actividad');
        $table->integer('id_transaccion')->references('id_transaccion')->on('transacciones');
        $table->integer('id_actividad')->references('id_actividad')->on('actividad');
        $table->dateTime('hora_compra');
        $table->string('tipo_entrada', 20);
        $table->smallInteger('num_entradas');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
