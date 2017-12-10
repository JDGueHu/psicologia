<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaCiudadesCitaController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades_cita', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ciudad')->unique();
            $table->string('municipio');
            $table->string('pais');

            $table->boolean('alive')->default(true);
    
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
        Schema::dropIfExists('ciudades_cita');
    }
}
