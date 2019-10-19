<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
 
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('me_gusta');
            $table->morphs('likable');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
