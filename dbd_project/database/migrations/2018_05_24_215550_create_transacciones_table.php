<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('ID_transaccion');
            //$table->primary('ID_transaccion');
            $table->integer('ID_usuario')->references('ID_usuario')->on('usuarios');
            $table->bigInteger('monto');
            $table->boolean('ya_cancelado');
            $table->date('fecha_compra');
            $table->time('hora_compra');
            $table->smallInteger('numero_cuenta_compra');
            $table->text('descripcion');
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
        Schema::dropIfExists('transacciones');
    }
}
