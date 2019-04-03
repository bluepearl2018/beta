<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcelanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sourcelanguages', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->text('name');
            $table->string('name_fr')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_nl')->nullable();
            $table->string('name_pt')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_de')->nullable();
            $table->string('name_it')->nullable();
            $table->string('code', '2')->nullable();
            $table->string('region', '5')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('targetlanguages', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->text('name');
            $table->string('name_fr')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_nl')->nullable();
            $table->string('name_pt')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_de')->nullable();
            $table->string('name_it')->nullable();
            $table->string('code', '2')->nullable();
            $table->string('region', '5')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sourcelanguages');
        Schema::dropIfExists('targetlanguages');
    }
}
