<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->increments('id_chofer');
            $table->string('capacidad_auto', 20);
            $table->string('patente', 10)->nullable();
            $table->string('pais', 30);
            $table->string('ciudad', 30);
            $table->decimal('tarifa_por_kilometro');
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
        Schema::dropIfExists('choferes');
    }
}
