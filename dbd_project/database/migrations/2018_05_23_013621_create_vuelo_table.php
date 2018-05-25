<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo', function (Blueprint $table) {
            $table->increments('id_vuelo');
            $table->interger('id_aerolinea')->references('id_aerolinea')->on('aerolinea');
            $table->string('nombre_avion');
            $table->string('aeropuerto_origen');
            $table->string('aeropuerto_destino');
            $table->time('hora_salida');
            $table->time('hora_llegada');
            $table->date('fecha_salida');
            $table->date('fecha_llegada');
            $table->smallInterger('cap_turista');
            $table->smallInterger('cap_ejecutivo');
            $table->smallInterger('cap_primera_clase');
            $table->smallInterger('cap_equipaje');
            $table->smallInterger('cap_turista');
            //$table->string('formato_vuelo'); Saco formato vuelo, no estoy seguro si sirve de algo
            $table->Interger('descuento');
            $table->Interger('valor_turista');  //Separe precios para cada tipo asiento
            $table->Interger('valor_ejecutivo');
            $table->Interger('valor_primera_clase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelo');
    }
}
