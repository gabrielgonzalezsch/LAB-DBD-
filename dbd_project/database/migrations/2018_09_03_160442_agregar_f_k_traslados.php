<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFKTraslados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('traslados', function (Blueprint $table) {
          $table->integer('id_chofer')->references('id_chofer')->on('choferes')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('traslados', function (Blueprint $table) {
          $table->dropColumn('id_chofer');
        });

    
    }
}
