<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->text('slug');
            $table->text('name');
            $table->string('icon', '10')->unique();
            $table->text('description')->nullable();
            $table->enum('front_status', ['on', 'off'])->default('off');
            $table->enum('back_status', ['on', 'off'])->default('on');
            $table->enum('status', ['dev', 'test', 'on', 'off'])->default('dev');
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
        Schema::dropIfExists('modules');
    }
}
