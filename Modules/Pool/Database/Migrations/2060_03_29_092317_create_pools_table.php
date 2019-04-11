<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('manager_id')->unsigned()->nullable()->index();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->tinyInteger('status_id')->unsigned()->index()->default(0);
            $table->tinyInteger('visibility_id')->unsigned()->index()->default(1);
            $table->text('slug');
            $table->unsignedInteger('email_id')->default(1);
            $table->text('name');
            $table->longText('meta')->nullable();
            $table->longText('lead')->nullable();
            $table->longText('description')->nullable();
            $table->text('keywords')->nullable();

            $table->foreign('status_id')->references('id')->on('statuses')->nullable();
            $table->foreign('visibility_id')->references('id')->on('statuses')->nullable();
            $table->foreign('parent_id')->references('id')->on('pools')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('email_id')->references('id')->on('emails');
            
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
        Schema::dropIfExists('pools');
    }
}
