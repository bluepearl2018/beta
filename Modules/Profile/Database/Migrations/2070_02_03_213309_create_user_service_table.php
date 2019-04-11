<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_service', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->tinyInteger('visibility_id')->unsigned()->default(1);
            $table->tinyInteger('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('visibility_id')->references('id')->on('statuses');
            // Place prévue, mais les tarifs des traducteurs ne sont pas des 
            // montants de marchés publics :-)
            $table->float('min_rate', '8', '3')->nullable();
            $table->float('max_rate', '8', '3')->nullable();
            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services');
            $table->integer('service_category_id')->unsigned()->index();
            $table->foreign('service_category_id')->references('id')->on('service_categories');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('service_id', 'user_id'));
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_service');
    }
}
