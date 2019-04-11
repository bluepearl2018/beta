<?php
namespace Modules\Blog\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Blog\Http\Requests\ArticleRequest as StoreRequest;
use Modules\Blog\Http\Requests\ArticleRequest as UpdateRequest;

class BlogArticleCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("Modules\Blog\Entities\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/blog/articles');
        $this->crud->setEntityNameStrings('article', 'articles');
        
        /*
        |--------------------------------------------------------------------------
        | FILTERS
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */
        
        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'parent_id',
                                'label' => 'Parent',
                                'entity' => 'Parent',
                                'type' => 'select',
                                'attribute' => 'parent_id',
                                'model' => "Modules\Blog\Entities\Article",
                            ]);
        
        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text'
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
                                'name' => 'title',
                                'label' => 'Title',
                                'type' => 'text',
                                'placeholder' => 'Your title here',
                            ]);

        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'hint' => 'Will be automatically generated from your title, if left empty.',
                                // 'disabled' => 'disabled'
                            ]);
        $this->crud->addField([    // WYSIWYG
                                'name' => 'content',
                                'label' => 'Content',
                                'type' => 'ckeditor',
                                'placeholder' => 'Your textarea text here',
                            ]);
        $this->crud->addField([    // Image
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'browse',
                            ]);
        $this->crud->enableAjaxTable();
        
        /*
        |--------------------------------------------------------------------------
        | BUTTONS
        |--------------------------------------------------------------------------
        */
                
        // $this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');
    }
    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }
    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}