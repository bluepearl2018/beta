<?php

namespace Modules\Profile\Repositories;

use App\Models\RoleUser;
use Auth;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 24, 2018, 8:45 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRoleRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoleUser::class;
    }

}
