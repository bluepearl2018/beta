<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_types', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->text('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('file_types')->insert(
            array(
                array('name' => 'Certificat'),
                array('name' => 'Glossaire'),
                array('name' => 'Mémoire de traduction'),
                array('name' => 'Document de référence'),
                array('name' => 'Avatar'),
                array('name' => 'Photo'),
                array('name' => 'Logo'),
                array('name' => 'Document personnel')
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
        Schema::dropIfExists('file_types');
    }
}
