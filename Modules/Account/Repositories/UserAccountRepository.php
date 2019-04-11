<?php

namespace Modules\Account\Repositories;

use \App\Models\User;

class UserAccountRepository extends User
{
    protected function model()
    {
        return User::all();
    }
    
    /**
     * Get User Profile for Current User
     */
    protected function getUserAccountForCurrentUser($currentUser)
    {
        return User::where('id', $currentUser)->first();
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'firstname',
        'surname',
        'country_id',
        'general_terms',
        'register_as',
        'status_id',
        'VAT',
        'mother_language',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];


    // Retrieves check user VAT
    // TODO :: try  catch ? 

    public function getCurrentUser()
    {
        return Auth::User();
    }
    

    // Retrieves check user VAT
    // TODO :: try  catch ? 

    public function getUserVAT($user)
    {
        if(!is_null(Auth::User()->VAT)){
            return Auth::User()->VAT;
        }
    }

    // Determine if user has V A T
    // TODO : check via VIES controller

    public function hasVAT($user)
    {
        if(!is_null(Auth::User()->VAT)){
            return true;
        }
        return false;
    }

    // Determine if user ACCOUNT is active

    public function isActive($user)
    {
        if(Auth::User()->status_id == TRUE){
            return FALSE;
        }
        return TRUE;
    }

    // Determine if user ACCOUNT is visible

    public function isVisible($user)
    {
        if(Auth::User()->visibility_id == FALSE){
            return FALSE;
        }
        return TRUE;
    }
    
    // Determine if a user is aubscriber

    public function isFree($user)
    {
        if(!Auth::User()->hasRole('premium')){
            return TRUE;
        }
        return FALSE;
    }
    
    // Determine if a user is a premium aubscriber

    public function isPremium($user)
    {
        if(!Auth::User()->hasRole('premium')){
            return FALSE;
        }
        return TRUE;
    }
    
    // Determine if a user is a premium exclusive aubscriber
    public function isPremiumExclusive($user)
    {
        if(!Auth::User()->hasRole('premium-exclusive')){
            return FALSE;
        }
        return TRUE;
    }

    // This field is used to determine whether a user is active or not active

    public function getUserStatus($user)
    {
        if(Auth::User()->status_id == 0){
            return array('UserStatus' => 'warning');
        }
        elseif(Auth::User()->status_id == 1){
            return array('UserStatus' => 'success');
        }
    }

    // Another way to check wether user has required subscription role
    // TODO : convert in order to work with a normal RoleUser::class

    public function getUserLevel($user)
    {
        if(!Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return array('UserLevel' => NULL);
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return array('UserLevel' => 'warning');
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return array('UserLevel' => 'success');
        }
    }

    // In order to comply with GDPR, user should be invisible ??

    public function getUserVisibility($user)
    {
        if(Auth::User()->visibility_id == 0){
            return array('UserVisibility' => 'warning');
        }
        elseif(Auth::User()->visibility_id == 1){
            return array('UserVisibility' => 'success');
        }
    }

    // TODO : use a VAT VIES Checker
    
    public function getUserVATStatus($user)
    {
        if(!is_null(Auth::User()->VAT)){
            return array('UserVAT' => 'success');
        }
        elseif(is_null(Auth::User()->VAT)){
            return array('UserVAT' => 'danger');
        }
    }

}