<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('slug', '191')->nullable();
            $table->unsignedInteger('organization_category_id')->nullable()->index();
            $table->foreign('organization_category_id')->references('id')->on('organization_categories')->index();
            $table->string('short_name', '191')->nullable();
            $table->text('name');
            $table->string('name_fr')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_nl')->nullable();
            $table->string('name_pt')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_de')->nullable();
            $table->string('name_it')->nullable();
            $table->text('description')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_nl')->nullable();
            $table->text('description_es')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_it')->nullable();
            $table->text('description_pt')->nullable();
            $table->text('description_ru')->nullable();
            $table->string('address1', '191')->nullable();
            $table->string('address2', '191')->nullable();
            $table->string('postal_code', '14')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->unsignedInteger('country_id')->index();
            $table->string('phone_number')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('direct_email')->nullable();
            $table->string('general_email')->nullable();       
            $table->string('website', '255');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}