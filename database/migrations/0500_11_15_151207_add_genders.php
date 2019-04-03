<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('genders')->insert(
            array(
                array('id' => '1','name' => '{"fr":"M.", "en":"Mr", "nl":"Dhr.", "es":"Señor", "de":"Herr", "it":"Signore", "ru":"Мистер", "pt":"Sr"}','created_at' => '2018-11-15 14:54:51','updated_at' => '2019-03-25 11:26:19','deleted_at' => NULL),
                array('id' => '2','name' => '{"fr":"Mme", "en":"Mrs", "nl":"Mevr.", "es":"Señora", "de":"Frau", "it":"Sig.ra", "ru":"Г-жа", "pt":"Sra"}','created_at' => '2018-11-15 15:07:48','updated_at' => '2018-11-15 15:07:48','deleted_at' => NULL),
                array('id' => '3','name' => '{"fr":"Melle", "en":"Miss", "nl":"Juffrouw", "es":"Señorita", "de":"Fraulein", "it":"Signorina", "ru":"скучать", "pt":"Senhorita"}','created_at' => '2018-11-15 15:07:56','updated_at' => '2018-11-15 15:07:56','deleted_at' => NULL),
                array('id' => '4','name' => '{"fr":"Dr", "en":"Doctor", "nl":"Dr.", "es":"Dr.", "de":"Doktor", "it":"Dottore", "ru":"доктор", "pt":"Dr."}','created_at' => '2018-11-15 15:10:46','updated_at' => '2018-11-15 15:10:46','deleted_at' => NULL),
                array('id' => '5','name' => '{"fr":"Pr", "en":"Professor", "nl":"Pr.", "es":"Pr.", "de":"Professor", "it":"Professore", "ru":"Профессор", "pt":"Pr."}','created_at' => '2018-11-15 15:10:46','updated_at' => '2018-11-15 15:10:46','deleted_at' => NULL)
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
