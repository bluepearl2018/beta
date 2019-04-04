<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('modules')->insert(
            array(
                array('id' => '1','slug' => 'uitables','name' => 'UiTables','icon' => 'table','description' => NULL,'front_status' => 'off','back_status' => 'on','status' => 'dev','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
                array('id' => '2','slug' => 'splash','name' => 'Splash','icon' => 'splash','description' => NULL,'front_status' => 'off','back_status' => 'on','status' => 'dev','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
                array('id' => '3','slug' => 'welcome','name' => 'Welcome','icon' => 'home','description' => NULL,'front_status' => 'on','back_status' => 'on','status' => 'dev','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
                array('id' => '4','slug' => 'blog','name' => 'Blog','icon' => 'rss','description' => NULL,'front_status' => 'on','back_status' => 'on','status' => 'dev','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
                array('id' => '5','slug' => 'pages','name' => 'About Eutranet','icon' => 'question-circle','description' => 'Toutes les questions que vous vous proposez à notre propos','front_status' => 'on','back_status' => 'on','status' => 'dev','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
                array('id' => '6','slug' => 'contact','name' => 'Contact','icon' => 'envelope','description' => 'Fonctionnalités de messagerie','front_status' => 'on','back_status' => 'on','status' => 'dev','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL)
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
        //
    }
}
