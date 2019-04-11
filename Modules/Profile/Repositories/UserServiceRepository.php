<?php

namespace Modules\Profile\Repositories;

use App\Models\Service;
use Modules\Profile\Entities\UserService;

class UserServiceRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_id',
        'min_rate',
        'max_rate',
        'user_id',
        'status_id',
        'visibility_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserService::class;
    }

    public function getServicesForCurrentUser($user_id)
    {
        $userServices = UserService::where('user_id', $user_id)->get();
        $countServices = count($userServices);
        $countActiveServices = count($userServices->where('status_id', '1'));
        $countVisibleServices = count($userServices->where('visibility_id', '1'));
        $ServiceStatus = $this->getServiceStatus($user_id);
        return compact('userServices', 'countServices', 'countActiveServices', 'countVisibleServices', 'ServiceStatus');
    }
    
    public function getServiceStatus($user_id)
    {
        // dd($user_id);
        $countServices = count(UserService::where('user_id', $user_id)->get());
        // dd($countServices);
        $ServiceStatus['ServiceStatus'] = array();
        if($countServices < 1){
            $serviceStatus = array('ServiceStatus' => 'danger');
        }
        elseif($countServices <= 2){
            $serviceStatus = array('ServiceStatus' => 'warning');
        }
        elseif($countServices > 2){
            $serviceStatus = array('ServiceStatus' => 'success');
        }
        $ServiceStatus = array_merge($serviceStatus);
        // dd($ServiceStatus);
        return $ServiceStatus;
    }
}
