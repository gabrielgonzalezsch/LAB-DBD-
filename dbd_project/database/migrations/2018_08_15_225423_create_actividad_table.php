<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->increments('id_actividad');
            $table->string('nombre_actividad');
            $table->string('descripcion_actividad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('pais');
            $table->string('ciudad');
            $table->string('calle');
            $table->integer('valor_entrada');
            $table->integer('cupos');
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
        Schema::dropIfExists('actividad');
    }
}
