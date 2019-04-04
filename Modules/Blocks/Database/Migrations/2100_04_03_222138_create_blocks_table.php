<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('lead');
            $table->text('description');
            $table->text('image');
            $table->enum('category', ['marketing', 'cta']);
            $table->boolean('status_id')->default(FALSE);
            $table->boolean('visibility_id')->default(FALSE);
            $table->integer('page_id')->unsigned()->index()->nullable();
            $table->foreign('page_id')->references('id')->on('pages');
            $table->integer('module_id')->unsigned()->index()->nullable();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->softDeletes();
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
        Schema::dropIfExists('blocks');
    }
}
