<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function( Blueprint $table ){
            $table->increments('id');
            $table->string('name', 60);
            $table->binary('image')->nullable($value = true);
            $table->string('email');
            $table->string('password');
            $table->boolean('admin');
            $table->string('graduate')->nullable($value = true);
            $table->string('occupation')->nullable($value = true);
            $table->string('age')->nullable($value = true);
            $table->string('gender')->nullable($value = true);
            $table->string('state')->nullable($value = true);
            $table->string('city')->nullable($value = true);
            $table->boolean('status')->nullable($value = true);    
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
