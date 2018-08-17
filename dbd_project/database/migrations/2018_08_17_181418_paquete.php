<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquetes', function (Blueprint $table) {
          $table->increments('id_paquete');
          $table->integer('id_vuelo')->references('id_vuelo')->on('vuelos');
          $table->integer('id_habitacion')->references('id_habitacion')->on('habitaciones');
          $table->integer('id_auto')->references('id_auto')->on('autos');
          $table->integer('descuento_paquete')->default(0);
          $table->text('descripcion');
          $table->bigInteger('monto');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquetes');
    }
}
