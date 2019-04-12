<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\RoleUserRequest as StoreRequest;
use App\Http\Requests\RoleUserRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class RoleUserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RoleUserCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Role');
        $this->crud->setModel('App\Models\User');
        $this->crud->setModel('App\Models\RoleUser');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/role_user');
        $this->crud->setEntityNameStrings('Role for User', 'Roles for Users');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->enableExportButtons();
        $this->crud->addFilter([ // add a "simple" filter called Draft 
            'type' => 'simple',
            'name' => 'Superadminfilter',
            'label'=> 'Superadmin'
          ],
          false, // the simple filter has no values, just the "Draft" label specified above
          function() { // if the filter is active (the GET parameter "draft" exits)
              $this->crud->addClause('where', 'role_id', '1'); 
              // we've added a clause to the CRUD so that only elements with draft=1 are shown in the table
              // an alternative syntax to this would have been
              // $this->crud->query = $this->crud->query->where('draft', '1'); 
              // another alternative syntax, in case you had a scopeDraft() on your model:
              // $this->crud->addClause('draft'); 
          });
          $this->crud->addFilter([ // add a "simple" filter called Draft 
            'type' => 'simple',
            'name' => 'Adminfilter',
            'label'=> 'Translators'
          ],
          false, // the simple filter has no values, just the "Draft" label specified above
          function() { // if the filter is active (the GET parameter "draft" exits)
              $this->crud->addClause('where', 'role_id', '2'); 
              // we've added a clause to the CRUD so that only elements with draft=1 are shown in the table
              // an alternative syntax to this would have been
              // $this->crud->query = $this->crud->query->where('draft', '1'); 
              // another alternative syntax, in case you had a scopeDraft() on your model:
              // $this->crud->addClause('draft'); 
          });
          
        $this->crud->addField([
            'label' => "Role Name",
            'type' => 'select',
            'name' => 'role_id', // the db column for the foreign key
            'entity' => 'role', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Role",
            // optional
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }), 
            // force the related options to be a custom query, instead of all(); 
            //you can use this to filter the results show in the select
        ]);
        $this->crud->addField([
            'label' => "User Name",
            'type' => 'select',
            'name' => 'user_id', // the db column for the foreign key
            'entity' => 'role', // the method that defines the relationship in your Model
            'attribute' => 'surname', // foreign key attribute that is shown to user
            'model' => "App\Models\User",
            // optional
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }), 
            // force the related options to be a custom query, instead of all(); 
            //you can use this to filter the results show in the select
        ]);
        $this->crud->addColumn('role_id');
        $this->crud->addColumn('user_id');
        $this->crud->setColumnDetails('role_id',
        [  // Select
            'label' => "Role Name",
            'type' => 'select',
            'name' => 'role_id', // the db column for the foreign key
            'entity' => 'role', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Role",
            // optional
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }), 
            // force the related options to be a custom query, instead of all(); 
            //you can use this to filter the results show in the select
        ]);
        $this->crud->setColumnDetails('user_id',
        [  // Select
            'label' => "User Name",
            'type' => 'select',
            'name' => 'user_id', // the db column for the foreign key
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'surname', // foreign key attribute that is shown to user
            'model' => "App\Models\User",   
        ]);
        // add asterisk for fields that are required in RoleUserRequest
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
