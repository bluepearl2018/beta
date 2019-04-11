<?php

namespace Modules\Profile\Repositories;

use App\Models\File;
use App\Models\FileType;
use App\Models\UserResource;

class UserResourceRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'resource_id',
        'resource_title',
        'resource_path',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserResource::class;
    }

    public function getResourcesForCurrentUser($user_id)
    {
        return UserResource::where('user_id', $user_id)->get();
    }

    
    /** GENERAL STATISTICS */
    public function countResourcesForCurrentUser($user_id)
    {
        return count(UserResource::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleResourcesForCurrentUser($user_id)
    {
        return UserResource::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleResourcesForCurrentUser($user_id)
    {
        return count(UserResource::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveResourcesForCurrentUser($user_id)
    {
        return count(UserResource::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function getResourceStatus($user_id)
    {
        // dd($user_id);
        $countResources = count(UserResource::where('user_id', $user_id)->get());
        // dd($countResources);
        $ResourceStatus['ResourceStatus'] = array();
        if($countResources < 1){
            $resourceStatus = array('ResourceStatus' => 'danger');
        }
        elseif($countResources <= 2){
            $resourceStatus = array('ResourceStatus' => 'warning');
        }
        elseif($countResources > 2){
            $resourceStatus = array('ResourceStatus' => 'success');
        }
        $ResourceStatus = array_merge($resourceStatus);
        // dd($ResourceStatus);
        return $ResourceStatus;
    }
}
