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
            $table->increments('id_traslado');
            $table->string('tipo_vehiculo', 20);
            $table->string('patente', 10)->nullable();
            $table->string('pais', 30);
            $table->string('ciudad', 30);
            $table->time('hora_inicio_servicio');
            $table->time('hora_fin_servicio');
            $table->smallInteger('cap_pasajeros');
            $table->integer('tarifa_por_kilometro');
            $table->integer('descuento')->nullable()->default(0);
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
