<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->binary('image');
            $table->string('link');
            $table->string('description');
            $table->string('educationLevel');
            $table->string('acessLevel');
            $table->float('evaluation');
            $table->integer('numberEvaluations');
            $table->boolean('requested');
            $table->boolean('status')->nullable($value = true);
            $table->integer('id_user');
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
        Schema::dropIfExists('objects');
    }
}
