<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tool', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->tinyInteger('visibility_id')->unsigned()->default(1);
            $table->tinyInteger('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('visibility_id')->references('id')->on('statuses');
            $table->integer('tool_id')->unsigned()->index();
            $table->foreign('tool_id')->references('id')->on('tools');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('tool_id', 'user_id'));
        });

        DB::table('user_tool')->insert(
            array(
                array('id' => '1','visibility_id' => '1','status_id' => '1','tool_id' => '3','user_id' => '2','created_at' => '2019-02-27 12:52:24','updated_at' => '2019-02-27 12:52:24','deleted_at' => NULL),
                array('id' => '2','visibility_id' => '1','status_id' => '1','tool_id' => '2','user_id' => '2','created_at' => '2019-02-28 08:50:57','updated_at' => '2019-02-28 08:50:57','deleted_at' => NULL),
              )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tool');
    }
}
