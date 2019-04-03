<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
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
            $table->foreign('parent_id')->references('id')->on('articles')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onUpdate('Cascade');
            $table->unsignedInteger('lft')->default(NULL)->nullable();
            $table->unsignedInteger('rgt')->default(NULL)->nullable();
            $table->unsignedInteger('depth')->default(NULL)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        DB::table('articles')->insert(
            array(
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'categorie-1','parent_id' => NULL,'title' => 'Categorie 1','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'categorie-2','parent_id' => NULL,'title' => 'Categorie 2','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'article-3','parent_id' => '2','title' => 'Article 3','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'article-4','parent_id' => '1','title' => 'Article 4','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
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
        Schema::dropIfExists('articles');
    }
}
