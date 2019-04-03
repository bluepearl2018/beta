<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_categories', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('slug', '191')->nullable();
            $table->text('name');
            $table->string('name_fr')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_nl')->nullable();
            $table->string('name_pt')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_de')->nullable();
            $table->string('name_it')->nullable();
            $table->text('description');
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_nl')->nullable();
            $table->text('description_es')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_it')->nullable();
            $table->text('description_pt')->nullable();
            $table->text('description_ru')->nullable();
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
        Schema::dropIfExists('organization_categories');
    }
}
