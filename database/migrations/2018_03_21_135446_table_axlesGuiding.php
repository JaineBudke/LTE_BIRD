<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAxlesGuiding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('axles_guiding', function( Blueprint $table ){
            $table->increments('id');
            $table->string('axles');
            $table->integer('id_object')->unsigned();            
            $table->foreign('id_object')->references('id')->on('objects');
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
        Schema::dropIfExists('axles_guiding');
    }
}
