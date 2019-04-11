<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolLinguistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_linguists', function (Blueprint $table) {$table->increments('id')->index();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('pool_id')->unsigned()->nullable()->index();
            $table->integer('linguist_id')->unsigned()->nullable()->index();
            $table->integer('language_id')->unsigned()->index()->default(1);
            $table->tinyInteger('status_id')->unsigned()->index()->default(0);
            $table->tinyInteger('visibility_id')->unsigned()->index()->default(0);
            $table->unsignedInteger('email_id')->default(1);
            
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('pool_id')->references('id')->on('pools')->nullable();
            $table->foreign('linguist_id')->references('id')->on('users')->nullable();
            $table->foreign('language_id')->references('id')->on('sourcelanguages')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->nullable();
            $table->foreign('visibility_id')->references('id')->on('statuses')->nullable();
            $table->foreign('email_id')->references('id')->on('emails');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('linguist_id', 'language_id', 'pool_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_linguits');
    }
}
