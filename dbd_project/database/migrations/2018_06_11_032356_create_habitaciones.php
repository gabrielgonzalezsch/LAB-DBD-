<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
          $table->increments('id_habitacion');
          $table->Integer('id_hotel')->references('id_hotel')->on('hoteles');
          $table->smallInteger('num_habitacion');
          $table->Integer('precio_por_noche');
          $table->boolean('ya_reservado')->default(false);
          $table->float('valoracion')->default(0.0);
          $table->text('descripcion')->nullable();
          $table->boolean('incluye_desayuno')->nullable()->default(false);
          $table->boolean('incluye_aire_acondicionado')->nullable()->default(false);
          $table->boolean('incluye_servicio')->nullable()->default(false);
          $table->smallInteger('num_camas_dobles');
          $table->smallInteger('num_camas_simples');
          $table->smallInteger('room_size');
          $table->Integer('descuento')->nullable()->default(0);
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
        Schema::dropIfExists('habitaciones');
    }
}
