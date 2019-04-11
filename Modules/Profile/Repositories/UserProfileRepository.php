<?php

namespace Modules\Profile\Repositories;

use \Modules\Profile\Entities\UserPool;
use \Modules\Profile\Entities\UserProfile;

/**
 * Class UserProfileRepository
 * @package App\Repositories
 * @version November 24, 2018, 9:36 pm UTC
 *
 * @method UserProfile findWithoutFail($id, $columns = ['*'])
 * @method UserProfile find($id, $columns = ['*'])
 * @method UserProfile first($columns = ['*'])
*/
class UserProfileRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'gender_id', // countableField
        'address1', // countableField
        'address2',
        'postal_code', // countableField
        'city', // countableField
        'state', // countableField
        'country_id', // countableField
        'phone', // countableField
        'mobile', // countableField
        'secondaryemail', // countableField
        'VAT',
        'description', // countableField
        'description_fr',
        'description_en',
        'description_es',
        'description_nl',
        'description_de',
        'description_it',
        'description_pt',
        'description_ru',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserProfile::class;
    }

    public function getUserProfileByUserId($decryptedid)
    {
        return UserProfile::where('user_id', $decryptedid)->where('deleted_at', NULL)->first();
    }
    
    public function getUserProfile($user)
    {
        $userProfile = UserProfile::where('id', $user)->where('deleted_at', NULL)->first();
        return $userProfile;
    }

    public function getUserVAT($currentUser)
    {
        $userVAT = UserProfile::where('id', $currentUser)->where('deleted_at', NULL)
        ->where('VAT', 'IS NOT', NULL)
        ->first();
        
        return $userVAT;
        
    }
    public function getUserProfileCompleteness($user)
    {
        $i = 0;
        $countableFields = 10;
        $countableProfile = UserProfile::where('user_id', '=', $user)->first();
        
        if(!$countableProfile){
            $i == 0;
            $profileCompleteness = ($i/10)*100;
            
        }
        
        elseif(isset($countableProfile) && $countableProfile){
            
            if(!is_null($countableProfile->address1) && !empty(preg_replace('/\s+/', "", $countableProfile->gender_id))){
                $i++;
            };
            
            if(!is_null($countableProfile->address1) && !empty(preg_replace('/\s+/', "", $countableProfile->postal_code))){
                $i++;
            };
            
            if(!is_null($countableProfile->address1) && !empty(preg_replace('/\s+/', "", $countableProfile->address1))){
                $i++;
            };
            
            if(!is_null($countableProfile->city) && !empty(preg_replace('/\s+/', "", $countableProfile->city))){
                $i++;
            };
            
            if(!is_null($countableProfile->state) && !empty(preg_replace('/\s+/', "", $countableProfile->state))){
                $i++;
            };
            
            if(!is_null($countableProfile->country_id) && !empty(preg_replace('/\s+/', "", $countableProfile->country_id))){
                $i++;
            };
            
            if(!is_null($countableProfile->phone) && !empty(preg_replace('/\s+/', "", $countableProfile->phone))){
                $i++;
            };
            
            if(!is_null($countableProfile->mobile) && !empty(preg_replace('/\s+/', "", $countableProfile->mobile))){
                $i++;
            };
            
            if(!is_null($countableProfile->secondaryemail) && !empty(preg_replace('/\s+/', "", $countableProfile->secondaryemail))){
                $i++;
            };
            
            if(!is_null($countableProfile->description) && !empty(preg_replace('/\s+/', "", $countableProfile->description))){
                $i++;
            };
            $profileCompleteness = ($i/10)*100;
        }
        
        $profileInfo = array('ProfileCompleteness' => $profileCompleteness);
        if($profileCompleteness <= 50){
            $profileStatus = array('ProfileStatus' => 'danger');
        }
        elseif($profileCompleteness < 100){
            $profileStatus = array('ProfileStatus' => 'warning');
        }
        elseif($profileCompleteness == 100){
            $profileStatus = array('ProfileStatus' => 'success');
        }

        $profileInfo = array_merge($profileInfo, $profileStatus);
        // dd($profileInfo);
        return $profileInfo;
    }
}
