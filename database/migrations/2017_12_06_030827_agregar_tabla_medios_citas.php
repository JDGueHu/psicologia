<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaMediosCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fecha');
            $table->string('hora');

            $table->integer('modalidad_id')->unsigned();
            $table->foreign('modalidad_id')->references('id')->on('modalidades');

            $table->string('medio_virtual')->nullable();
            $table->string('usuario_medio_virtual')->nullable();

            $table->string('tipo_direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('dirección')->nullable();

            $table->string('estado')->default('Por confirmar');

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
        Schema::dropIfExists('citas');
    }
}
