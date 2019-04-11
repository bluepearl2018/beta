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
        DB::table('emails')->insert(array('email' => 'admin@admin.com'));
        DB::table('emails')->insert(array('email' => 'webmaster@admin.com'));
        DB::table('emails')->insert(array('email' => 'vendors@admin.com'));
        DB::table('emails')->insert(array('email' => 'pools@admin.com'));
        DB::table('emails')->insert(array('email' => 'jobs@admin.com'));
        DB::table('emails')->insert(array('email' => 'partners@admin.com'));
        DB::table('emails')->insert(array('email' => 'organizations@admin.com'));
        DB::table('emails')->insert(array('email' => 'sponsors@admin.com'));


        DB::table('users')->insert(
            array(
                array('id' => '1','name' => 'Dr. Alvis Koepp IV','email' => 'rick65@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '2','name' => 'Dr. hthsr Koepp IV','email' => 'rick66@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '3','name' => 'Dr. Gred Koepp IV','email' => 'rick67@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '4','name' => 'Dr. AZD Koepp IV','email' => 'rick68@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '5','name' => 'Dr. gze Koepp IV','email' => 'rick69@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '6','name' => 'Dr. Alkttyjvis Koepp IV','email' => 'rick61@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '7','name' => 'Dr. fzefez Koepp IV','email' => 'rick6@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '8','name' => 'Dr. fze Koepp IV','email' => 'rick45@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '9','name' => 'Dr. qreuy Koepp IV','email' => 'ricdzd65@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
                array('id' => '10','name' => 'Dr. qrezhre Koepp IV','email' => 'ridzueghk65@example.net','email_verified_at' => NULL,'password' => '$2y$10$hAEYOfkFdIr3Ue3f7tHqEuzDW.kCbhMWsC48pci17BDjkQbhdrUny','remember_token' => 'jBB72451ds','created_at' => '2019-04-04 12:42:51','updated_at' => '2019-04-04 12:42:51'),
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
