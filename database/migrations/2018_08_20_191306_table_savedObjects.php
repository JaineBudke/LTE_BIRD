<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSavedObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_objects', function( Blueprint $table ){
            $table->increments('id');
            $table->integer('id_object')->unsigned();
            $table->foreign('id_object')->references('id')->on('objects');            
            $table->integer('id_user')->unsigned();            
            $table->foreign('id_user')->references('id')->on('users');
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
        //
    }
}
