<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pool', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('visibility_id')->unsigned()->default('1');
            $table->tinyInteger('status_id')->unsigned()->default('1');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('visibility_id')->references('id')->on('statuses');
            $table->integer('pool_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('pool_id')->references('id')->on('pools')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('pool_id', 'user_id'))->nullable();
        });

        DB::table('user_pool')->insert(
            array(
                array('id' => '1','visibility_id' => '1','status_id' => '1','pool_id' => '5','user_id' => '2','created_at' => '2019-02-28 08:55:56','updated_at' => '2019-02-28 08:55:56','deleted_at' => NULL),
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
        Schema::dropIfExists('user_pool');
    }
}
