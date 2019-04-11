<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_socialmedia', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('account')->default('eutranet');
            $table->tinyInteger('visibility_id')->unsigned()->default(1);
            $table->tinyInteger('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('visibility_id')->references('id')->on('statuses');
            $table->integer('socialmedia_id')->unsigned()->index();
            $table->foreign('socialmedia_id')->references('id')->on('socialmedias');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('socialmedia_id', 'user_id'));
        });

        DB::table('user_socialmedia')->insert(
            array(
                array('id' => '1','visibility_id' => '1','status_id' => '1','socialmedia_id' => '2','user_id' => '2','created_at' => '2019-02-28 08:30:20','updated_at' => '2019-02-28 08:30:20','deleted_at' => NULL,'account' => 'eutranet'),
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
        Schema::dropIfExists('user_socialmedia');
    }
}
