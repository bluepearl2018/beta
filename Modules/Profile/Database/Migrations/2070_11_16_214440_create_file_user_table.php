<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('status_id')->default('1');
            $table->boolean('visibility_id')->default('1');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('file_extension', '4')->nullable();
            $table->string('file_size', '255')->nullable();
            $table->string('file_name', '255')->nullable()->default('Untitled');
            $table->integer('file_type_id')->unsigned()->nullable()->default('1');
            $table->foreign('file_type_id')->references('id')->on('file_types');
            $table->string('file_mime', '255')->nullable()->default('');
            // This should be tweaked => medium BLOB
            $table->longBinary('file_content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_user');
    }
}
