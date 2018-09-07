<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTraslados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('compra_traslado', function(Blueprint $table){
        $table->increments('id_compra_traslado');
        $table->integer('id_transaccion')->references('id_transaccion')->on('transacciones');
        $table->integer('id_traslado')->references('id_traslado')->on('traslado');
        $table->string('formato_traslado');
        $table->dateTime('hora_compra');
        $table->dateTime('hora_traslado');
        $table->smallInteger('num_personas');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra_traslado');
    }
}
