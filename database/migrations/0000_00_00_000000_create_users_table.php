<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('firstname')->nullable();
            $table->string('surname')->nullable();
            $table->integer('country_id')->default(0);
            $table->boolean('general_terms')->default(TRUE);
            $table->integer('register_as')->nullable();
            $table->boolean('status_id')->default(FALSE);
            $table->boolean('visibility_id')->default(FALSE);
            $table->string('VAT')->nullable();
            $table->integer('mother_language')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
