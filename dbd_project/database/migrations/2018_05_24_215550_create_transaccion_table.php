<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            $table->increments('id_transaccion');
            $table->interger('id_usuario')->references('id_usuario')->on('usuario');
            $table->bigInterger('monto');
            $table->boolean('ya_cancelado');
            $table->date('fecha_compra');
            $table->time('hora_compra');
            $table->smallInterger('numero_cuenta_compra');
            $table->text('descripcion');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaccion');
    }
}
