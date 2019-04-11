<?php

namespace Modules\Pool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use \Modules\Pool\Http\Requests\PoolRequest as StoreRequest;
use \Modules\Pool\Http\Requests\PoolRequest as UpdateRequest;
use \Backpack\CRUD\CrudPanel;

class PoolAdminController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('\Modules\Pool\Entities\Pool');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/pools');
        $this->crud->setEntityNameStrings('pool', 'pools');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 2);

        
        // Create and update
        $this->crud->addField([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'attribute' => 'name',
            'model' => "\Modules\Pool\Entities\Pool",
            // Get domains (not pools)
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        
        $this->crud->addField([
            'name' => 'type',
            'label' => 'Type',
            'type' => 'page_or_link',
            'page_model' => '\Modules\Pool\Entities\Pool',
        ]);

        // add asterisk for fields that are required in PoolRequest
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
