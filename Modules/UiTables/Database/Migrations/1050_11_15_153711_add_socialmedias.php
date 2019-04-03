<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialmedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('socialmedias')->insert(array(
            array('id' => '1','name' => 'LinkedIn','helper' => NULL,'url' => 'https://www.linkedin.com/','deleted_at' => NULL,'created_at' => '2018-11-08 00:00:00','updated_at' => '2018-11-08 00:00:00'),
            array('id' => '2','name' => 'Facebook','helper' => NULL,'url' => 'https://www.facebook.com/','deleted_at' => NULL,'created_at' => '2018-11-08 00:00:00','updated_at' => '2018-11-08 00:00:00'),
            array('id' => '3','name' => 'Twitter','helper' => NULL,'url' => 'https://www.twitter.com/','deleted_at' => NULL,'created_at' => '2018-11-08 00:00:00','updated_at' => '2018-11-08 00:00:00')
		));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
