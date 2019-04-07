<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EspecialidadEstablecimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades_establecimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('establecimiento_id');
            $table->unsignedInteger('especialidad_id');

            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
            $table->foreign('especialidad_id')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades_establecimientos');
    }
}
