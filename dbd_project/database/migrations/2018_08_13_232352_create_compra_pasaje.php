<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraPasaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_pasaje', function(Blueprint $table){
          $table->increments('id_compra_pasaje');
          $table->integer('id_transaccion')->references('id_transaccion')->on('transacciones');
          $table->integer('id_vuelo')->references('id_vuelo')->on('vuelos');
          $table->dateTime('hora_compra');
          $table->smallInteger('num_asiento');
          $table->string('tipo_asiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra_pasaje');
    }
}
