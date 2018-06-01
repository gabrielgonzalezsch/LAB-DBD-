<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->increments('ID_vuelo');
            //$table->primary('ID_vuelo');
            //$table->interger('ID_aerolinea')->references('ID_aerolinea')->on('aerolinea');
            $table->string('nombre_avion', 30);
            $table->string('aeropuerto_origen', 10);
            $table->string('aeropuerto_destino', 10);
            $table->time('hora_salida');
            $table->time('hora_llegada');
            $table->date('fecha_salida');
            $table->date('fecha_llegada');
            $table->smallInteger('cap_turista');
            $table->smallInteger('cap_ejecutivo');
            $table->smallInteger('cap_primera_clase');
            $table->smallInteger('cap_equipaje');
            //$table->string('formato_vuelo'); Saco formato vuelo, no estoy seguro si sirve de algo
            $table->Integer('descuento');
            $table->Integer('valor_turista');  //Separe precios para cada tipo asiento
            $table->Integer('valor_ejecutivo');
            $table->Integer('valor_primera_clase');
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
        Schema::dropIfExists('vuelos');
    }
}
