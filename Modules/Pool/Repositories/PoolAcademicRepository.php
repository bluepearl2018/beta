<?php

namespace Modules\Pool\Repositories;

use \Modules\Pool\Entities\Pool;
use \Modules\Pool\Entities\PoolAcademic;

/**
 * Class PoolAcademicRepository
 * @package Modules\Pool\Repositories
 * @version November 24, 2018, 11:47 pm UTC
 *
 * @method Pool findWithoutFail($id, $columns = ['*'])
 * @method Pool find($id, $columns = ['*'])
 * @method Pool first($columns = ['*'])
*/
class PoolAcademicRepository extends PoolAcademic
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
        return PoolAcademic::class;
    }

    public function getAcademicsForSelectedPool($selectedPool){
        $pool_id = Pool::where('slug', $selectedPool)->pluck('id');
        $poolAcademics = PoolAcademic::where('pool_id', $pool_id)->get();
        // dd($poolAcademics);
        return $poolAcademics;
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

}
