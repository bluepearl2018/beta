<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profile', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('user_id')->unsigned()->nullable();
        	$table->integer('gender_id')->unsigned()->nullable();
            $table->string('address1')->nullable();
        	$table->string('address2')->nullable();
        	$table->string('postal_code')->nullable();
        	$table->string('city')->nullable();
        	$table->string('state')->nullable();
        	$table->integer('country_id')->unsigned()->nullable();
        	$table->string('phone', 15)->nullable();
        	$table->string('mobile', 15)->nullable();
        	$table->string('secondaryemail')->email();
        	$table->string('VAT')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
        	$table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('country_id')->references('id')->on('countries');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_profile');
    }
}
