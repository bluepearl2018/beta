<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationCategories extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::table('organization_categories')->insert(
            array(
                array('id' => '1','name' => 'Organisations de traducteurs','name_fr' => 'Organisations de traducteurs','name_en' => 'Translator Organizations','name_es' => 'Organizaciones traductoras','name_nl' => 'Vertalersorganisaties','name_pt' => 'Organizações de tradutores','name_ru' => 'Переводчик','name_de' => 'Übersetzer-Organisationen','name_it' => 'Organizzazioni di traduttori','description' => 'Organisations de traducteurs référencées par Intranet.','description_fr' => 'Organisations de traducteurs','description_en' => 'Translator organizations acclaimed by Eutranet','description_nl' => 'Vertalerorganisaties  die Eutranet prijst','description_es' => 'Las organizaciones de traducción aclamadas por Eutranet','description_de' => 'Von Eutranet hochgelobte Übersetzungsorganisationen','description_it' => 'Organizzazioni di traduzione acclamate da Eutranet','description_pt' => 'Organizações de tradução aclamadas pelo Eutranet','description_ru' => 'Признанные Евтранет переводческие организации','deleted_at' => NULL,'created_at' => '2019-01-24 23:04:48','updated_at' => '2019-01-24 23:19:31','slug' => 'translator-organizations'),
                array('id' => '2','name' => 'Institutions académiques','name_fr' => 'Institutions académiques','name_en' => 'Academic Institutions','name_es' => 'Instituciones academicas','name_nl' => 'Academische instellingen','name_pt' => 'Instituições acadêmicas','name_ru' => 'Академические институты','name_de' => 'Akademische Einrichtungen','name_it' => 'Istituzioni accademiche','description' => 'Institutions académiques','description_fr' => 'Institutions académiques','description_en' => 'Academic Institutions','description_nl' => 'Academische instellingen','description_es' => 'Instituciones academicas','description_de' => 'Akademische Einrichtungen','description_it' => 'Istituzioni accademiche','description_pt' => 'Instituições acadêmicas','description_ru' => 'Академические институты','deleted_at' => NULL,'created_at' => '2019-01-24 23:15:25','updated_at' => '2019-01-24 23:19:09','slug' => 'academic-institutions')
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
