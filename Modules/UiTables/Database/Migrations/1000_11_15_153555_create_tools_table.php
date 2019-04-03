<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('tool_category_id')->unsigned()->index()->nullable();
            $table->text('name');
            $table->text('description')->nullable();
            $table->string('www');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tool_category_id')->references('id')->on('tool_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools');
    }
}
