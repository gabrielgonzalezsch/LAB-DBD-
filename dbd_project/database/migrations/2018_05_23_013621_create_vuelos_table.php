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
            $table->increments('id_vuelo');
            $table->string('nombre_avion', 30);
            $table->string('nombre_aerolinea', 30);
            $table->string('aeropuerto_origen', 5);
            $table->string('aeropuerto_destino', 5);
            $table->DateTime('hora_salida')->format('Y-m-d H:i');
            $table->DateTime('hora_llegada')->format('Y-m-d H:i');
            $table->smallInteger('cap_turista')->default(0);
            $table->smallInteger('cap_ejecutivo')->default(0);
            $table->smallInteger('cap_primera_clase')->default(0);
            $table->smallInteger('cap_equipaje')->default(0);
            $table->smallInteger('maletas_por_persona')->nullable()->default(1);
            $table->Integer('descuento')->nullable()->default(0);
            $table->Integer('valor_turista');
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
