<?php

namespace Modules\Profile\Repositories;

use Auth;
use Modules\Profile\Entities\UserTeam;
use App\User;
use DB;
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class UserTeamRepository
 * @package App\Repositories
 * @version December 29, 2018, 3:27 pm UTC
 *
 * @method UserTeam findWithoutFail($id, $columns = ['*'])
 * @method UserTeam find($id, $columns = ['*'])
 * @method UserTeam first($columns = ['*'])
*/
class UserTeamRepository 
{
    use HasRoles; // <------ and this
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'recruiter_id',
        'accepted_id',
        'visibility_id',
        'deleted_at',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserTeam::class;
    }
    
    public function getTeamForCurrentUser($user)
    {
        return UserTeam::where('recruiter_id', $user)
        ->where('networking_status', 'accepted')
        ->get();
    }
    
    // Translators in Recruiter's Team
    public function getTeamTranslatorsForCurrentUser($user){
        $unfilteredTeam = $this->getTeamForCurrentUser($user);
        $translatorsInTeam = [];
        foreach($unfilteredTeam as $teamMember){
            if(User::find($teamMember->user_id)->hasRole('vendor') == TRUE){
                $translatorsInTeam[] = $teamMember;
            }
        }
        return $translatorsInTeam;
    }

    // Dtpers in Recruiter's Team
    public function getTeamDtpersForCurrentUser($user){
        $dtpersInTeam = [];
        foreach($this->getTeamForCurrentUser($user) as $teamMember){
            if(User::find($teamMember->user_id)->hasRole('dtper') == TRUE){
                $dtpersInTeam[] = $teamMember;
            }
        }
        return $dtpersInTeam;
    }

    // Developers in Recruiter's Team
    public function getTeamDevelopersForCurrentUser($user){
        $developersInTeam = [];
        foreach($this->getTeamForCurrentUser($user) as $teamMember){
            if(User::find($teamMember->user_id)->hasRole('developer') == TRUE){
                $developersInTeam[] = $teamMember;
            }
        }
        return $developersInTeam;
    }

    // Academics in Recruiter's Team
    public function getTeamAcademicsForCurrentUser($user){
        $academicsInTeam = [];
        foreach($this->getTeamForCurrentUser($user) as $teamMember){
            if(User::find($teamMember->user_id)->hasRole('academic') == TRUE){
                $academicsInTeam[] = $teamMember;
            }
        }
        return $academicsInTeam;
    }

    public function countTeamForCurrentUser($user)
    {
        return count(UserTeam::where('recruiter_id', $user)
        ->where('networking_status', 'accepted')
        ->get());
    }

    public function countAcceptedTeamForCurrentUser($user)
    {
        return count(UserTeam::where('recruiter_id', $user)
        ->where('networking_status', 'accepted')
        ->get());
    }

    public function countCustomersForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('networking_status', '=', 'accepted') // Accepted
        ->get());
    }

    public function countProspectsForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('recruiter_id', '!=', $user)
        ->where('networking_status', '=', 'pending') // Accepted
        ->get());
    }

    public function countColleaguesForCurrentUser($user){
        return count(UserTeam::where('recruiter_id', '!=', $user)
        ->where('user_id', '=', $user)
        ->where('networking_status', '=', 'accepted') // Accepted
        ->get());
    }

    public function countIncomingFromProspectsForCurrentUser($user){
        return count(UserTeam::where('recruiter_id', '!=', $user)
        ->where('user_id', $user)
        ->where('networking_status', 'pending')
        ->get());
    }

    public function countIncomingFromColleaguesForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('networking_status', '=', 'pending') // pending
        ->orderBy('visibility_id', 'DESC')
        ->get());
    }

    public function countAllIncomingForCurrentUser($user){
        $iFC = $this->countIncomingFromColleaguesForCurrentUser($user);
        $iFP = $this->countIncomingFromProspectsForCurrentUser($user);
        $sum = $iFC + $iFP; 
        return $sum;
    }

    public function countOutcomingForCurrentUser($user){
        return count(UserTeam::where('recruiter_id', '=', $user)
        ->orderBy('visibility_id', 'DESC')
        ->get());
    }

    public function countOutcomingOutForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('networking_status', '=', 'out') // pending
        ->orderBy('visibility_id', 'DESC')
        ->get());
    }
    
    public function countOutcomingAcceptedForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('networking_status', '=', 'accepted') // pending
        ->orderBy('visibility_id', 'DESC')
        ->get());
    }

    public function countOutcomingDeclinedForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('networking_status', '=', 'declined') // declined
        ->orderBy('visibility_id', 'DESC')
        ->get());
    }

    public function countOutcomingPendingForCurrentUser($user){
        return count(UserTeam::where('user_id', '=', $user)
        ->where('networking_status', '=', 'pending') // pending
        ->orderBy('visibility_id', 'DESC')
        ->get());
    }
}
