<?php

namespace Modules\Profile\Repositories;

use Modules\Profile\Entities\UserSocialmedia;

class UserSocialmediaRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'socialmedia_id',
        'account',
        'visibility_id',
        'status_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserSocialmedia::class;
    }

    public function getSocialMediasForCurrentUser($user_id)
    {
        $userSocialmedias = UserSocialmedia::where('user_id', $user_id)->get();
        $countSocialmedias = count($userSocialmedias);
        $countActiveSocialmedias = count($userSocialmedias->where('status_id', '1'));
        $countVisibleSocialmedias = count($userSocialmedias->where('visibility_id', '1'));
        $SocialMediaStatus = $this->getSocialMediaStatus($user_id);
        return compact('userSocialmedias', 'countSocialmedias', 'countActiveSocialmedias', 'countVisibleSocialmedias', 'SocialMediaStatus');
    }
    
    public function getActiveSocialMediasForCurrentUser($user_id)
    {
        return UserSocialmedia::where('user_id', $user_id)
        ->where('status_id', '1')
        ->get();
    }

    /** GENERAL STATISTICS */
    public function countSocialmediasForCurrentUser($user_id)
    {
        return count(UserSocialmedia::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleSocialmediasForCurrentUser($user_id)
    {
        return UserSocialmedia::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleSocialmediasForCurrentUser($user_id)
    {
        return count(UserSocialmedia::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveSocialmediasForCurrentUser($user_id)
    {
        return count(UserSocialmedia::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function checkSocialMediasForCurrentUser($user_id, $requestSocMediaId)
    {
        // dd($user_id);
        // dd($requestSocMediaId);
        $foundResults = UserSocialmedia::where('user_id', '=', $user_id)
        ->where('socialmedia_id', '=', $requestSocMediaId)
        ->get();
        if($foundResults->isEmpty()){
            return TRUE;
        }
        return FALSE;
    }

    public function getSocialMediaStatus($user)
    {
        $countSocialmedias = count(UserSocialmedia::where('user_id', $user)->get());
        $SocialMediaStatus['SocialMediaStatus'] = array();
        if($countSocialmedias < 1){
            $socialMediaStatus = array('SocialMediaStatus' => 'danger');
        }
        elseif($countSocialmedias < 2){
            $socialMediaStatus = array('SocialMediaStatus' => 'warning');
        }
        elseif($countSocialmedias >= 2){
            $socialMediaStatus = array('SocialMediaStatus' => 'success');
        }
        $SocialMediaStatus = array_merge($socialMediaStatus);
        // dd($SocialMediaStatus);
        return $SocialMediaStatus;
    }
}
