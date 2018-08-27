<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLogBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event');
            $table->timestamps();
            $table->integer('id_user')->unsigned();            
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_object')->unsigned();            
            $table->foreign('id_object')->references('id')->on('objects');
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
