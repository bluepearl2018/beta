<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGlossaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_glossary', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('glossary_id')->unsigned()->index();
            $table->string('glossary_title', '255')->nullable();
            $table->string('glossary_path', '255')->nullable();
            $table->tinyInteger('visibility_id')->unsigned()->default(1);
            $table->tinyInteger('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('visibility_id')->references('id')->on('statuses');
            $table->foreign('glossary_id')->references('id')->on('glossaries');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('glossary_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_glossary');
    }
}
