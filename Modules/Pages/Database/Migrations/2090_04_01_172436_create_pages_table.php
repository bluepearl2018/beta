<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->longText('meta')->default(NULL)->nullable();
            $table->unsignedInteger('module_id')->nullable()->index();
            $table->string('slug');
            $table->unsignedInteger('parent_id')->default(NULL)->nullable();
            $table->text('title');
            $table->text('lead');
            $table->text('content');
            $table->text('image')->nullable();
            $table->enum('status', ['draft', 'published', 'deleted'])->default('draft');
            $table->integer('user_id')->default('1');
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onUpdate('Cascade');
            $table->unsignedInteger('lft')->default(NULL)->nullable();
            $table->unsignedInteger('rgt')->default(NULL)->nullable();
            $table->unsignedInteger('depth')->default(NULL)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        // Add page Categories
        DB::table('pages')->insert(
            array(
                array('id' => '1','meta' => 'Meta values','module_id' => NULL,'slug' => 'welcome','parent_id' => NULL,'title' => 'Bienvenue','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('id' => '2','meta' => 'Meta values','module_id' => NULL,'slug' => 'mission-statement','parent_id' => NULL,'title' => 'Mission','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('id' => '3','meta' => 'Meta values','module_id' => NULL,'slug' => 'core-team','parent_id' => NULL,'title' => 'Équipe','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('id' => '4','meta' => 'Meta values','module_id' => NULL,'slug' => 'employment','parent_id' => NULL,'title' => 'Recrutement','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('id' => '5','meta' => 'Meta values','module_id' => NULL,'slug' => 'gdpr','parent_id' => NULL,'title' => 'RGPD','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('id' => '6','meta' => 'Meta values','module_id' => NULL,'slug' => 'about-eutranet','parent_id' => NULL,'title' => 'À propos','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL)
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
        Schema::dropIfExists('pages');
    }
}