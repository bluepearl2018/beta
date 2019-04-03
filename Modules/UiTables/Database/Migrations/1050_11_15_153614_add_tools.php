<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tools')->insert(array(
		  array('id' => '1', 'tool_category_id' => NULL, 'name' => 'XTM','www' => 'https://xtm.cloud/product/','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '2', 'tool_category_id' => NULL, 'name' => 'MemSource','www' => 'http://www.memsource.com','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '3', 'tool_category_id' => NULL, 'name' => 'memoQ','www' => 'https://www.memoq.com/fr/','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '4', 'tool_category_id' => NULL, 'name' => 'Wordfast','www' => 'https://wordfast.com/','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '5', 'tool_category_id' => NULL, 'name' => 'Déjà Vu','www' => 'https://atril.com/compare-our-products/','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '6', 'tool_category_id' => NULL, 'name' => 'Transit','www' => 'https://www.star-group.net/en/products/translation-and-localization.html','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '7', 'tool_category_id' => NULL, 'name' => 'OmegaT','www' => 'https://omegat.org','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '8', 'tool_category_id' => NULL, 'name' => 'MadCap Lingo','www' => 'https://www.madcapsoftware.com/products/lingo/','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '9', 'tool_category_id' => NULL, 'name' => 'SDL Trados','www' => 'https://www.sdltrados.com','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  array('id' => '10', 'tool_category_id' => NULL, 'name' => 'MateCat','www' => 'https://www.matecat.com/','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
		  
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
