<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaTable extends Migration
{

    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banco');
            $table->string('nro_tarjeta');
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');     
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarjeta');
    }
}
