<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            $table->increments('ID_traslado');
            //$table->primary('ID_traslado');
            $table->string('tipo_vehiculo');
            $table->string('patente');
            $table->string('pais');
            $table->string('ciudad');
            $table->time('hora_inicio_servicio');
            $table->time('hora_fin_servicio');
            $table->smallInteger('cap_pasajeros');
            $table->integer('tarifa_por_kilometro');
            $table->integer('descuento');
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
        Schema::dropIfExists('traslados');
    }
}
