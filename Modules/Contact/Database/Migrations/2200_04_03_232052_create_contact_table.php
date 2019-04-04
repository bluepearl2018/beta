<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->longText('meta')->default(NULL)->nullable();
            $table->unsignedInteger('module_id')->nullable()->index();
            $table->string('slug');
            $table->string('icon', 40)->nullable();
            $table->unsignedInteger('parent_id')->default(NULL)->nullable();
            $table->text('title');
            $table->text('lead');
            $table->text('content');
            $table->text('image')->nullable();
            $table->enum('status', ['draft', 'published', 'deleted'])->default('draft');
            $table->integer('user_id')->default('1');
            $table->foreign('parent_id')->references('id')->on('contact')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onUpdate('Cascade');
            $table->unsignedInteger('lft')->default(NULL)->nullable();
            $table->unsignedInteger('rgt')->default(NULL)->nullable();
            $table->unsignedInteger('depth')->default(NULL)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        // Add page Categories
        DB::table('contact')->insert(
            array(
                array('meta' => 'Meta values','module_id' => NULL,'icon' => 'envelope', 'slug' => 'contact','parent_id' => NULL,'title' => 'Contact Eutranet','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'icon' => 'bolt', 'slug' => 'contact-eutranet','parent_id' => NULL,'title' => 'Contact Eutranet','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'icon' => 'bug', 'slug' => 'contact-webmaster','parent_id' => NULL,'title' => 'Report a bug','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'icon' => 'mail-bulk', 'slug' => 'contact-my-team','parent_id' => NULL,'title' => 'Contact my team','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'icon' => 'star', 'slug' => 'contact-a-pool-manager','parent_id' => NULL,'title' => 'Contact a pool manager','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'icon' => 'phone', 'slug' => 'contact-core','parent_id' => NULL,'title' => 'Contact a pool manager','lead' => 'lead','content' => 'content','image' => NULL,'status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
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
        Schema::dropIfExists('contact');
    }
}