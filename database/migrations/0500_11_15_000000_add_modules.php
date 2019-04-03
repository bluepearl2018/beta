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
                array('id' => '1','name' => 'UiTables','slug' => 'uitables','icon' => 'table'),
                array('id' => '2','name' => 'Splash','slug' => 'splash', 'icon' => 'splash'),
                array('id' => '3','name' => 'Welcome','slug' => 'welcome', 'icon' => 'home'),
                array('id' => '4','name' => 'Blog','slug' => 'blog', 'icon' => 'rss')
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
