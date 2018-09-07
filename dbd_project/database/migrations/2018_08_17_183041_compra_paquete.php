<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompraPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('compra_paquete', function(Blueprint $table){
        $table->increments('id_compra_paquete');
        $table->integer('id_transaccion')->references('id_transaccion')->on('transacciones');
        $table->integer('id_paquete')->references('id_paquete')->on('paquetes');
        $table->string('tipo_paquete', 30);
        $table->dateTime('hora_compra');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra_paquete');
    }
}
