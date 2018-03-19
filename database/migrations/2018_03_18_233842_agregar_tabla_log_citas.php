<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaLogCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_citas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cita_id')->unsigned();
            $table->foreign('cita_id')->references('id')->on('citas');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('accion_sobre_cita');
            $table->string('motivo_accíon', 500);
            $table->string('fecha');

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
        Schema::dropIfExists('log_citas');
    }
}
