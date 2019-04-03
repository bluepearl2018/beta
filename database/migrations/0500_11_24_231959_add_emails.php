<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('emails')->insert(array('email' => 'management@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'webmaster@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'vendors@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'pools@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'jobs@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'partners@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'organizations@eutranet.com'));
        DB::table('emails')->insert(array('email' => 'sponsors@eutranet.com'));
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
