<?php

namespace Modules\Pool\Repositories;

use \Modules\Pool\Entities\Pool;
use \Modules\Pool\Entities\PoolDeveloper;

/**
 * Class PoolDeveloperRepository
 * @package Modules\Pool\Repositories
*/

class PoolDeveloperRepository extends PoolDeveloper
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'linguist_id',
        'email_id',
        'language_id',
        'pool_id',
        'status_id',
        'user_id',
        'visibility_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PoolDeveloper::class;
    }

    public function getDevelopersForSelectedPool($selectedPool){
        $pool_id = Pool::where('slug', $selectedPool)->pluck('id');
        $poolDevelopers = PoolDeveloper::where('pool_id', $pool_id)->get();
        // dd($poolDevelopers);
        return $poolDevelopers;
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

}
