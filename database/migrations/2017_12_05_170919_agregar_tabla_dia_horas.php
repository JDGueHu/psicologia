<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaDiaHoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_horas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('dia_id')->unsigned();
            $table->foreign('dia_id')->references('id')->on('dias');

            $table->string('hora');
            $table->double('costo', 10, 2);
            $table->string('numero_dia');

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
        Schema::dropIfExists('dia_horas');
    }
}
