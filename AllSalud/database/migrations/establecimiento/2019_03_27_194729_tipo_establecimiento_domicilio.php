<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoEstablecimientoDomicilio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tipo_establecimiento_domicilio', function (Blueprint $table) {
            
            $table->increments('id');

            $table->unsignedInteger('domicilio_id');
            
            $table->unsignedInteger('tipo_id');
          

            $table->foreign('tipo_id')->references('id')->on('tipo_establecimientos');

            $table->foreign('domicilio_id')->references('id')->on('domicilios');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_establecimiento_domicilio');
    }
}
