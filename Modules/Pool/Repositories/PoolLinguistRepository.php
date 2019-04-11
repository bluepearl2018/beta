<?php

namespace Modules\Pool\Repositories;

use \Modules\Pool\Entities\Pool;
use \Modules\Pool\Entities\PoolLinguist;

/**
 * Class PoolLinguistRepository
 * @package Modules\Pool\Repositories
 * @version November 24, 2018, 11:47 pm UTC
*/
class PoolLinguistRepository extends PoolLinguist
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
        return PoolLinguist::class;
    }

    public function getLinguistsForSelectedPool($selectedPool){
        $pool_id = Pool::where('slug', $selectedPool)->pluck('id');
        $poolLinguists = PoolLinguist::where('pool_id', $pool_id)->get();
        // dd($poolLinguists);
        return $poolLinguists;
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

}
