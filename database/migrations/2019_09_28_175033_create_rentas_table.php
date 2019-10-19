<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentasTable extends Migration
{
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');     
            $table->bigInteger('pelicula_id')->unsigned();
            $table->foreign('pelicula_id')->references('id')->on('peliculas');     
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rentas');
    }
}
