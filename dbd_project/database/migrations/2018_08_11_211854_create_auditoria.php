<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria', function (Blueprint $table) {
          $table->increments('id_log');
          $table->string('nombre_tabla', 30); //Tabla que fue modificada
          $table->string('nombre_usuario'); //Usuario que hizo el cambio, llave foranea
          $table->string('descripcion_accion');
          $table->integer('llave');
          $table->string('atributo', 100);
          $table->string('tipo_dato', 20);
          $table->string('valor_antiguo');
          $table->string('valor_nuevo');
          $table->dateTime('fecha_realizado');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoria', function (Blueprint $table) {
            //
        });
    }
}
