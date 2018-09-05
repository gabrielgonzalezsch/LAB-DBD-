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
            $table->integer('id_chofer');
            $table->string('pais', 30);
            $table->string('ciudad', 30);
            $table->string('aeropuerto', 30);
            $table->string('hotel', 30);
            $table->boolean('aeropuerto_a_hotel');
            $table->date('fecha_servicio');
            $table->time('hora_servicio');
            $table->smallInteger('cap_pasajeros');
            $table->integer('monto');
            $table->decimal('distancia_recorrido');
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
