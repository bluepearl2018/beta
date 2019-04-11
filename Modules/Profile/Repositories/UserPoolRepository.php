<?php

namespace Modules\Profile\Repositories;

use App\Models\Pool;
use \Modules\Profile\Entities\UserPool;
use App\User;
use Auth;

/**
 * Class UserPoolRepository
 * @package App\Repositories
 * @version December 3, 2018, 11:36 am UTC
 *
 * @method UserPool findWithoutFail($id, $columns = ['*'])
 * @method UserPool find($id, $columns = ['*'])
 * @method UserPool first($columns = ['*'])
*/
class UserPoolRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pool_id',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserPool::class;
    }

    public function getPoolsForCurrentUser($user_id)
    {
        $userPools = UserPool::where('user_id', $user_id)->get();
        $countPools = count($userPools);
        $countActivePools = count($userPools->where('status_id', '1'));
        $countVisiblePools = count($userPools->where('visibility_id', '1'));
        $PoolStatus = $this->getPoolStatus($user_id);
        return compact('userPools', 'countPools', 'countActivePools', 'countVisiblePools', 'PoolStatus');
    }
    

    public function getPoolMembers($poolcode)
    {
        $selectedpool = Pool::where('code', '=', $poolcode)->get()->pluck('id');
        //dd($selectedpool);
        return UserPool::where('pool_id', $selectedpool)
        ->where('visibility_id', '1')
        ->where('status_id', '1')->get();
    }

    // Developers in Recruiter's Team
    public function getTranslatorsForCurrentPool($poolcode){
        $translatorsInPool = [];
        foreach($this->getPoolMembers($poolcode) as $poolMember){
            if(User::find($poolMember->user_id)->hasRole('vendor|translator-verified') == TRUE){
                $translatorsInPool[] = $poolMember;
            }
        }
        return $translatorsInPool;
    }
    
    // Dtpers in Recruiter's Team
    public function getDtpersForCurrentPool($poolcode){
        $dtpersInPool = [];
        foreach($this->getPoolMembers($poolcode) as $poolMember){
            if(User::find($poolMember->user_id)->hasRole('dtper|dtper-verified') == TRUE){
                $dtpersInPool[] = $poolMember;
            }
        }
        return $dtpersInPool;
    }
    
    // Developers in Recruiter's Team
    public function getDevelopersForCurrentPool($poolcode){
        $developersInPool = [];
        foreach($this->getPoolMembers($poolcode) as $poolMember){
            if(User::find($poolMember->user_id)->hasRole('developer|developer-verified') == TRUE){
                $developersInPool[] = $poolMember;
            }
        }
        return $developersInPool;
    }
    
    // Academics in Recruiter's Team
    public function getAcademicsForCurrentPool($poolcode){
        $academicsInPool = [];
        foreach($this->getPoolMembers($poolcode) as $poolMember){
            if(User::find($poolMember->user_id)->hasRole('academic|academic-verified') == TRUE){
                $academicsInPool[] = $poolMember;
            }
        }
        return $academicsInPool;
    }

    public function countActivePoolsForCurrentUser()
    {
        return count(UserPool::where('user_id', Auth::User()->id)->where('status_id', '1')->pluck('id'));
    }
    public function getPoolStatus($user_id)
    {
        $countPools = $this->countActivePoolsForCurrentUser();

        $PoolStatus['PoolStatus'] = array();
        if($countPools < 1){
            $poolStatus = array('PoolStatus' => 'danger');
        }
        elseif($countPools <= 2){
            $poolStatus = array('PoolStatus' => 'warning');
        }
        elseif($countPools > 2){
            $poolStatus = array('PoolStatus' => 'success');
        }
        $PoolStatus = array_merge($poolStatus);
        // dd($PoolStatus);
        return $PoolStatus;
    }
}
