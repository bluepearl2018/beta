<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_languages', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('sourceLang_id')->index();
            $table->tinyInteger('status_id')->unsigned()->index()->default(0);
            $table->tinyInteger('visibility_id')->unsigned()->index()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses')->nullable();
            $table->foreign('visibility_id')->references('id')->on('statuses')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sourceLang_id')->references('id')->on('sourcelanguages');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('user_id','sourceLang_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_languages');
    }
}
