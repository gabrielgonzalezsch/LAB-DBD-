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
            $table->string('pais', 100);
            $table->string('ciudad', 100);
            $table->string('aeropuerto', 100);
            $table->string('hotel', 100);
            $table->string('formato_traslado');
            $table->date('fecha_traslado');
            $table->time('hora_traslado');
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
