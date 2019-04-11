<?php

namespace Modules\Pool\Repositories;

use \Modules\Pool\Entities\Pool;
use \Modules\Pool\Entities\PoolManager;

/**
 * Class PoolManagerRepository
 * @package Modules\Pool\Repositories
 * @version November 24, 2018, 11:47 pm UTC
*/
class PoolManagerRepository extends PoolManager
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
        return PoolManager::class;
    }

    public function getManagersForSelectedPool($selectedPool){
        $pool_id = Pool::where('slug', $selectedPool)->pluck('id');
        $poolManagers = PoolManager::where('pool_id', $pool_id)->get();
        // dd($poolManagers);
        return $poolManagers;
    }

    public function getManagersStakesForSelectedPool($selectedPool){
        $pool_id = Pool::where('slug', $selectedPool)->pluck('id');
        $configServiceLocales = \Config::get('app.serviceLocales');
        $languageService = \Modules\UiTables\Entities\Sourcelanguage::whereIn('code', $configServiceLocales)->pluck('id')->toArray();
        
        return $languageService;
    }
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

}
