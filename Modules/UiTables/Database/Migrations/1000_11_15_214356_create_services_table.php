<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('service_category_id')->unsigned()->index()->default(1)->nullable();
            $table->text('name');
            $table->string('name_fr')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_nl')->nullable();
            $table->string('name_pt')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_de')->nullable();
            $table->string('name_it')->nullable();
            $table->string('lead')->nullable();
            $table->string('lead_fr')->nullable();
            $table->string('lead_en')->nullable();
            $table->string('lead_es')->nullable();
            $table->string('lead_nl')->nullable();
            $table->string('lead_pt')->nullable();
            $table->string('lead_ru')->nullable();
            $table->string('lead_de')->nullable();
            $table->string('lead_it')->nullable();
            $table->text('description')->nullable();
            $table->string('description_fr')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_es')->nullable();
            $table->string('description_nl')->nullable();
            $table->string('description_pt')->nullable();
            $table->string('description_ru')->nullable();
            $table->string('description_de')->nullable();
            $table->string('description_it')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('service_category_id')->references('id')->on('service_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
