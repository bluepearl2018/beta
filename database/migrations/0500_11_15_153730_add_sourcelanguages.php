<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSourcelanguages extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::table('sourcelanguages')->insert(array(
            array('id' => '2','name' => 'Albanian','code' => 'sq','region' => 'sq','deleted_at' => NULL,'created_at' => '2018-11-08 00:00:00','updated_at' => '2018-11-08 00:00:00'),
            array('id' => '26','name' => 'Belarusian','code' => 'be','region' => 'be','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '29','name' => 'Bosnian','code' => 'bs','region' => 'bs','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '30','name' => 'Bulgarian','code' => 'bg','region' => 'bg','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '32','name' => 'Catalan','code' => 'ca','region' => 'ca','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '38','name' => 'Croatian','code' => 'hr','region' => 'hr','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '39','name' => 'Czech','code' => 'cs','region' => 'cs','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '40','name' => 'Danish','code' => 'da','region' => 'da','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '42','name' => 'Dutch - Belgium','code' => 'nl','region' => 'nl-be','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '43','name' => 'Dutch - Netherlands','code' => 'nl','region' => 'nl-nl','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '49','name' => 'English - Great Britain','code' => 'en','region' => 'en-gb','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '51','name' => 'English - Ireland','code' => 'en','region' => 'en-ie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '59','name' => 'Estonian','code' => 'et','region' => 'et','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '61','name' => 'Faroese','code' => 'fo','region' => 'fo','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '64','name' => 'Finnish','code' => 'fi','region' => 'fi','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '65','name' => 'French - Belgium','code' => 'fr','region' => 'fr-be','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '70','name' => 'French - France','code' => 'fr','region' => 'fr-fr','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '76','name' => 'French - Switzerland','code' => 'fr','region' => 'fr-ch','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '79','name' => 'Gaelic - Ireland','code' => 'gd','region' => 'gd-ie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '80','name' => 'Gaelic - Scotland','code' => 'gd','region' => 'gd','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '81','name' => 'Galician','code' => 'gl','region' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '83','name' => 'German - Austria','code' => 'de','region' => 'de-at','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '84','name' => 'German - Germany','code' => 'de','region' => 'de-de','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '85','name' => 'German - Liechtenstein','code' => 'de','region' => 'de-li','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '86','name' => 'German - Luxembourg','code' => 'de','region' => 'de-lu','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '87','name' => 'German - Switzerland','code' => 'de','region' => 'de-ch','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '88','name' => 'Greek','code' => 'el','region' => 'el','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '92','name' => 'Hebrew','code' => 'he','region' => 'he','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '94','name' => 'Hungarian','code' => 'hu','region' => 'hu','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '95','name' => 'Icelandic','code' => 'is','region' => 'is','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '98','name' => 'Italian - Italy','code' => 'it','region' => 'it-it','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '99','name' => 'Italian - Switzerland','code' => 'it','region' => 'it-ch','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '109','name' => 'Latin','code' => 'la','region' => 'la','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '110','name' => 'Latvian','code' => 'lv','region' => 'lv','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '111','name' => 'Lithuanian','code' => 'lt','region' => 'lt','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '115','name' => 'Maltese','code' => 'mt','region' => 'mt','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '122','name' => 'Norwegian - Bokml','code' => 'nb','region' => 'no-no','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '123','name' => 'Norwegian - Nynorsk','code' => 'nn','region' => 'no-no','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '125','name' => 'Polish','code' => 'pl','region' => 'pl','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '127','name' => 'Portuguese - Portugal','code' => 'pt','region' => 'pt-pt','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '129','name' => 'Raeto-Romance','code' => 'rm','region' => 'rm','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '130','name' => 'Romanian - Moldova','code' => 'ro','region' => 'ro-mo','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '131','name' => 'Romanian - Romania','code' => 'ro','region' => 'ro','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '132','name' => 'Russian','code' => 'ru','region' => 'ru','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '133','name' => 'Russian - Moldova','code' => 'ru','region' => 'ru-mo','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '136','name' => 'Serbian - Cyrillic','code' => 'sr','region' => 'sr-sp','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '137','name' => 'Serbian - Latin','code' => 'sr','region' => 'sr-sp','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '142','name' => 'Slovak','code' => 'sk','region' => 'sk','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '143','name' => 'Slovenian','code' => 'sl','region' => 'sl','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '162','name' => 'Spanish - Spain','code' => 'es','region' => 'es-es','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '166','name' => 'Swedish - Finland','code' => 'sv','region' => 'sv-fi','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '167','name' => 'Swedish - Sweden','code' => 'sv','region' => 'sv-se','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '176','name' => 'Turkish','code' => 'tr','region' => 'tr','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '178','name' => 'Ukrainian','code' => 'uk','region' => 'uk','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '184','name' => 'Welsh','code' => 'cy','region' => 'cy','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL)
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
