<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoteles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->increments('ID_hotel');
            $table->string('nombre_hotel', 100);
            $table->string('pais', 30);
            $table->string('ciudad', 50);
            $table->string('direccion', 100)->unique();
            $table->float('valoracion')->default(0.0);
            $table->Integer('num_valoraciones')->default(0);//Implementar luego
            $table->Integer('num_comentarios')->default(0);//Implementar luego
            $table->decimal('latitud', 10, 7);
            $table->decimal('longitud', 10, 7);
            $table->smallInteger('habitaciones_disponibles')->nullable()->default(0);
            $table->Integer('precio_min_habitacion')->nullable();
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
        Schema::dropIfExists('hoteles');
    }
}
