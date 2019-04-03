<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('articles')->insert(
            array(
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'news-1','parent_id' => NULL,'title' => 'toolbox','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'news-2','parent_id' => 1,'title' => 'toolbox','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'news-3','parent_id' => 1,'title' => 'toolbox','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
                array('meta' => 'Meta values','module_id' => NULL,'slug' => 'news-4','parent_id' => 1,'title' => 'toolbox','lead' => 'toolbox','content' => 'toolbox','status' => 'draft','user_id' => '1','lft' => NULL,'rgt' => NULL,'depth' => NULL,'deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
            )
        );
    }
}
