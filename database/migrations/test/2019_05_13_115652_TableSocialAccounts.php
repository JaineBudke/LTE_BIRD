<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSocialAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
	    $table->increments('id');
	    $table->integer('user_id')->unsigned();
	    $table->string('provider_user_id');        //Store the provider's user id.
	    $table->enum('provider', ['facebook', 'twitter', 'linkedin', 'github']); //Store the provider.
	    $table->timestamps();
	    $table->foreign('user_id')->references('id')->on('users');
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
