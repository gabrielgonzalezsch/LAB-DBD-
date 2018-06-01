<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('ID_auto');
            $table->string('tipo_vehiculo', 20);
            $table->string('modelo_auto', 50);
            $table->string('compañia', 30);
            $table->string('patente', 10);
            $table->string('pais_arriendo', 30);
            $table->string('ciudad_arriendo', 30);
            $table->string('calle_arriendo', 50);
            $table->integer('precio_por_dia');
            $table->smallInteger('cap_pasajeros');
            $table->string('descripcion_auto', 100);
            //$table->text('detalle_auto');
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
        Schema::dropIfExists('autos');
    }
}
