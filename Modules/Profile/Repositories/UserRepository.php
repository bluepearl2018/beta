<?php

namespace Modules\Profile\Repositories;

use \App\User;
use Auth;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 24, 2018, 8:45 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository 
{
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    // Count how many users

    public function count()
    {
        $count = count(User::all());
        return $count;
    }

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
        if(Auth::User()->status_id == 0){
            return FALSE;
        }
        return TRUE;
    }

    // Determine if user ACCOUNT is visible

    public function isVisible($user)
    {
        if(Auth::User()->visibility_id == 0){
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

    // Set Max Language pairs for a User
    // TODO : delete, since it belongs to UserLanguagePairs

    public function maxLangPairForUser($user)
    {
        // TODO : should be an app config param
        
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxLangPair = 1;
        }
        elseif(Auth::User()->hasRole('premium')){
            return $maxLangPair = 2;
        }
        elseif(Auth::User()->hasRole('premium-exclusive')){
            return $maxLangPair = 10;
        }
    }

    // Set Max Pools for a User
    // TODO : delete, since it belongs to UserLanguagePairs
    
    public function maxPoolForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxPool = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxPool = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxPool = 10;
        }
    }

    // Set Max Files for a User
    // TODO : delete, since it belongs to User File
    
    public function maxFileForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxFile = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxFile = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxFile = 25;
        }
    }

    // Set Max Translation Memories for a User
    // TODO : delete, since it belongs to User File
    
    public function maxMemoryForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxMemory = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxMemory = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxMemory = 25;
        }
    }

    // Set Max Translation Glossaries for a User
    // TODO : delete, since it belongs to User File
    
    public function maxGlossaryForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxGlossary = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxGlossary = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxGlossary = 25;
        }
    }

    // Set Max Translation Glossaries for a User
    // TODO : delete, since it belongs to User File
    
    public function maxResourceForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxResource = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxResource = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxResource = 25;
        }
    }

    // Set Max Files for a user
    // TODO : delete, since it belongs to User File
    
    public function maxCertificateForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxCertificate = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxCertificate = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxCertificate = 10;
        }
    }


    // Set Max Services for a User
    // TODO : delete, since it belongs to UserLanguagePairs
    
    public function maxServiceForUser($user)
    {
        if(!Auth::User()->hasRole('premium|premium-exclusive')){
            return $maxService = 1;
        }
        elseif(Auth::User()->hasRole('premium') && !Auth::User()->hasRole('premium-exclusive')){
            return $maxService = 3;
        }
        elseif(Auth::User()->hasRole('premium') && Auth::User()->hasRole('premium-exclusive')){
            return $maxService = 25;
        }
    }

    // Set Max Pools for any user
    // TODO : delete, since it belongs to SociaMedia
    // TODO 2 : filter according tool category

    public function maxSocialmediaForUser($user){
        return \Modules\UiTables\Entities\SociaMedia::count();
    }

    // Set Max Tools for any user
    // Assuming user share common tools within the scope of an organization
    // TODO : delete, since it belongs to Tool

    public function maxToolForUser($user){
        return \Modules\UiTables\Entities\Tool::count();
    }

    
    // TODO : delete, since it belongs to UserLanguagePairs

    public function userCheck($user){
        $user = $user->id;
        if(Auth::User()->id = $user){
            return TRUE;
        }
        return FALSE;
    }
}
