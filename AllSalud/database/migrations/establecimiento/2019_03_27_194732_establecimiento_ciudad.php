<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstablecimientoCiudad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento_ciudad', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('establecimiento_id');
            $table->unsignedInteger('ciudad_id');
            $table->string('domicilio');

            $table->string('latitud');
            $table->string('longitud');


            
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimiento_ciudad');
    }
}
