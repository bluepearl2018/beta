<?php

namespace Modules\Profile\Repositories;

use Modules\Profile\Entities\UserOrganization;

class UserOrganizationRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'organization_id',
        'user_id',
        'status_id',
        'visibility_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserOrganization::class;
    }

    public function getOrganizationsForCurrentUser($user_id)
    {
        $userOrganizations = UserOrganization::where('user_id', $user_id)->get();
        $countOrganizations = count($userOrganizations);
        $countActiveOrganizations = count($userOrganizations->where('status_id', '1'));
        $countVisibleOrganizations = count($userOrganizations->where('visibility_id', '1'));
        $OrganizationStatus = $this->getOrganizationStatus($user_id);
        return compact('userOrganizations', 'countOrganizations', 'countActiveOrganizations', 'countVisibleOrganizations', 'OrganizationStatus');
    }


    public function getOrganizationStatus($user)
    {
        $countOrganisations = count(UserOrganization::where('user_id', $user)->pluck('id'));
        $OrganizationStatus['OrganizationStatus'] = array();
        if($countOrganisations < 1){
            $orgStatus = array('OrganizationStatus' => 'warning');
        }
        elseif($countOrganisations >= 1){
            $orgStatus = array('OrganizationStatus' => 'success');
        }
        $OrganizationStatus = array_merge($orgStatus);
        // dd($OrganizationStatus);
        return $OrganizationStatus;
    }
}
