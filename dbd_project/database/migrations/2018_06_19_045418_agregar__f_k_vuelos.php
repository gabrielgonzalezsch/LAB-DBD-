<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFKVuelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vuelos', function (Blueprint $table) {
          $table->string('aeropuerto_origen', 5)->references('cod_aeropuerto')->on('aeropuertos')->change();
          $table->string('aeropuerto_destino', 5)->references('cod_aeropuerto')->on('aeropuertos')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vuelos', function (Blueprint $table) {
            $table->dropColumn('aeropuerto_destino');
            $table->dropColumn('aeropuerto_origen');
        });
    }
}
