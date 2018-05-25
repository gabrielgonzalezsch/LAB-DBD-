<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado', function (Blueprint $table) {
            $table->increments('ID_traslado');
            $table->string('tipo_vehiculo');
            $table->string('patente');
            $table->string('pais');
            $table->string('ciudad');
            $table->time('hora_inicio_servicio');
            $table->time('hora_fin_servicio');
            $table->smallInterger('cap_pasajeros');
            $table->interger('tarifa_por_kilometro');
            $table->interger('descuento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslado');
    }
}
