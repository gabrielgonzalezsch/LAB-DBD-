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
            $table->increments('id_auto');
            $table->string('modelo_auto', 50);
            $table->string('compañia', 30);
            $table->string('patente', 10)->nullable();
            $table->string('pais_arriendo', 30);
            $table->string('ciudad_arriendo', 30);
            $table->string('calle_arriendo', 100);
            $table->integer('precio_por_dia');
            $table->smallInteger('cap_pasajeros')->default(4)->nullable();
            $table->string('descripcion_auto', 100)->nullable()->default('No descripción');
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
        Schema::dropIfExists('autos');
    }
}
