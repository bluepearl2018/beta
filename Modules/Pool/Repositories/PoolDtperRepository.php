<?php

namespace Modules\Pool\Repositories;

use \Modules\Pool\Entities\Pool;
use \Modules\Pool\Entities\PoolDtper;

/**
 * Class PoolDtperRepository
 * @package Modules\Pool\Repositories
*/

class PoolDtperRepository extends PoolDtper
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dtper_id',
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
        return PoolDtper::class;
    }

    public function getDtpersForSelectedPool($selectedPool){
        $pool_id = Pool::where('slug', $selectedPool)->pluck('id');
        $poolDtpers = PoolDtper::where('pool_id', $pool_id)->get();
        // dd($poolDtpers);
        return $poolDtpers;
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

}
