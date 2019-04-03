<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatuses extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::table('statuses')->insert(
            array(
                array('id' => '0','name' => '{"fr":"Inactif / Invisible / Off", "en":"Inactive / Invisible / Off", "nl":"Inactief / Onzichtbaar / Uit", "es":"Inactivo / Invisible / Apagado", "de":"Inaktiv / Unsichtbar / Aus", "it":"Inattivo / invisibile / spento", "ru":"Неактивный / невидимый / выкл", "pt":"Inativo / Invisível / Desligado"}','description' => '{"fr":"Inactif / Invisible / Off", "en":"Inactive / Invisible / Off", "nl":"Inactief / Onzichtbaar / Uit", "es":"Inactivo / Invisible / Apagado", "de":"Inaktiv / Unsichtbar / Aus", "it":"Inattivo / invisibile / spento", "ru":"Неактивный / невидимый / выкл", "pt":"Inativo / Invisível / Desligado"}','deleted_at' => NULL,'created_at' => '2018-11-15 00:00:00','updated_at' => '2019-01-26 16:26:28'),
                array('id' => '1','name' => '{"fr":"Actif / Visible / Allumé", "en":"Active / Visible / On", "nl":"Actief / Zichtbaar / Aan", "es":"Activo / Visible / Encendido", "de":"Aktiv / Sichtbar / Ein", "it":"Attivo / Visibile / Acceso", "ru":"Активный / Видимый / Вкл", "pt":"Ativo / Visível / On"}','description' => '{"fr":"Actif / Visible / Allumé", "en":"Active / Visible / On", "nl":"Actief / Zichtbaar / Aan", "es":"Activo / Visible / Encendido", "de":"Aktiv / Sichtbar / Ein", "it":"Attivo / Visibile / Acceso", "ru":"Активный / Видимый / Вкл", "pt":"Ativo / Visível / On"}','deleted_at' => NULL,'created_at' => '2018-12-11 00:00:00','updated_at' => '2019-01-26 16:28:10')
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
