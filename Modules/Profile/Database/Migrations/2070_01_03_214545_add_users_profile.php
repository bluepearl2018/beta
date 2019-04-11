<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users_profile')->insert(
            array(
                array('id' => '1','user_id' => '1','gender_id' => '2','address1' => 'Chemin Saint-Pierre, 14','address2' => NULL,'postal_code' => '7030','city' => 'Saint-Symphorien','state' => 'Hainaut','country_id' => '20','phone' => '495783673','mobile' => '495783673','secondaryemail' => 'stephanemaissin@hotmail.com','VAT' => NULL,'description' => NULL,'deleted_at' => NULL,'created_at' => '2019-01-29 14:35:20','updated_at' => '2019-01-29 14:35:20'),
                array('id' => '2','user_id' => '2','gender_id' => '2','address1' => '15 herd','address2' => NULL,'postal_code' => '33000','city' => 'Bordeaux','state' => 'Aquitaine','country_id' => '20','phone' => '495783673','mobile' => '495783673','secondaryemail' => 'geard2@glauk.com','VAT' => NULL,'description' => NULL,'deleted_at' => NULL,'created_at' => '2019-01-29 15:28:36','updated_at' => '2019-01-29 15:28:36'),
                array('id' => '3','user_id' => '3','gender_id' => '2','address1' => 'Rue ded g','address2' => NULL,'postal_code' => '33000','city' => 'Bordeaux','state' => 'Aquitaine','country_id' => '20','phone' => '495783673','mobile' => '495783673','secondaryemail' => 'geard2@glauk.com','VAT' => NULL,'description' => NULL,'deleted_at' => NULL,'created_at' => '2019-01-29 15:31:20','updated_at' => '2019-01-29 15:31:20'),
                array('id' => '4','user_id' => '4','gender_id' => '1','address1' => 'Chemin Saint-Pierre, 14','address2' => NULL,'postal_code' => '7030','city' => 'Saint-Symphorien','state' => 'Hainaut','country_id' => '20','phone' => '495783673','mobile' => '495783673','secondaryemail' => 'stephanemaissin@hotmail.com','VAT' => 'UK545454','description' => NULL,'deleted_at' => NULL,'created_at' => '2019-01-30 09:07:23','updated_at' => '2019-02-08 12:16:09'),
                array('id' => '5','user_id' => '5','gender_id' => '1','address1' => 'Rue de l\'infographie','address2' => NULL,'postal_code' => '7000','city' => 'Mons','state' => 'Hainaut','country_id' => '20','phone' => '495783673','mobile' => '495783673','secondaryemail' => 'stephanemaissin@hotmail.com','VAT' => NULL,'description' => NULL,'deleted_at' => NULL,'created_at' => '2019-02-26 09:05:04','updated_at' => '2019-02-26 09:05:23'),
                array('id' => '6','user_id' => '6','gender_id' => '1','address1' => 'Chemin Saint-Pierre, 14','address2' => NULL,'postal_code' => '7030','city' => 'Saint-Symphorien','state' => 'Hainaut','country_id' => '62','phone' => '+55495783673','mobile' => '+55495783673','secondaryemail' => 'testeur@admin.com','VAT' => NULL,'description' => NULL,'deleted_at' => NULL,'created_at' => '2019-03-21 07:05:17','updated_at' => '2019-03-21 07:11:15'),
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
        DB::table('users_profile');
    }
}