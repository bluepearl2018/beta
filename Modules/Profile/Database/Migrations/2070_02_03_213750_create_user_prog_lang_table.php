<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_prog_lang', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->tinyInteger('visibility_id')->unsigned()->default(1);
            $table->tinyInteger('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('visibility_id')->references('id')->on('statuses');
            $table->integer('prog_lang_id')->unsigned()->index();
            $table->foreign('prog_lang_id')->references('id')->on('prog_lang');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('prog_lang_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_prog_lang');
    }
}
