<?php

namespace Modules\Pages\Http\Controllers;

use \Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Pages\Http\Requests\TagRequest as StoreRequest;
use Modules\Pages\Http\Requests\TagRequest as UpdateRequest;
use \Backpack\CRUD\app\Http\CrudPanel;

/**
 * Class PagesAdminController
 * @package \Modules\Pages\Http\Controllers
 * @property-read CrudPanel $crud
 */
class PagesAdminController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('Modules\Pages\Entities\Page');
        $this->crud->setRoute('admin/pages');
        $this->crud->setEntityNameStrings('page', 'pages');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        
        $this->crud->setFromDb(); //
        $this->crud->addField(['name' => 'content', 'type' => 'wysiwyg', 'label' => 'Content']);
        $this->crud->addField(['name' => 'image', 'type' => 'image', 'label' => 'Content']);
        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('title', '2');
        // add asterisk for fields that are required in TagRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
