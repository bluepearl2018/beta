<?php

namespace Modules\Account\Repositories;

use \Modules\Account\Entities\UserProfile;

class UserProfileRepository extends UserProfile
{
    protected function model()
    {
        return UserProfile::all();
    }
    
    /**
     * Get User Profile for Current User
     */
    protected function getUserProfileForCurrentUser($currentUser)
    {
        return UserProfile::where('user_id', $currentUser)->first();
    }
    
}