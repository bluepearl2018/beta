<?php

namespace Modules\Profile\Repositories;
use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Entities\UserLanguagePair;

class UserLanguagePairRepository extends Model
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sourceLang_id',
        'targetLang_id',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserLanguagePair::class;
    }
    
    public function getLanguagePairsForCurrentUser($user_id)
    {
        $userLanguagePairs = UserLanguagePair::where('user_id', $user_id)->get();
        $countLanguagePairs = count($userLanguagePairs);
        $countActiveLanguagePairs = count($userLanguagePairs->where('status_id', '1'));
        $countVisibleLanguagePairs = count($userLanguagePairs->where('visibility_id', '1'));
        $LanguagePairStatus = $this->getLanguagePairStatus($user_id);
        return compact('userLanguagePairs', 'countLanguagePairs', 'countActiveLanguagePairs', 'countVisibleLanguagePairs', 'LanguagePairStatus');
    }
        
    public function getActiveLanguagePairsForCurrentUser($user_id)
    {
        return UserLanguagePair::where('user_id', $user_id)->where('status_id', '1')->get();
    }
    
    /** GENERAL STATISTICS */
    public function countLanguagePairsForCurrentUser($user_id)
    {
        return count(UserLanguagePair::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleLanguagePairsForCurrentUser($user_id)
    {
        return UserLanguagePair::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleLanguagePairsForCurrentUser($user_id)
    {
        return count(UserLanguagePair::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveLanguagePairsForCurrentUser($user_id)
    {
        return count(UserLanguagePair::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function getLanguagePairStatus($user)
    {
        $countLanguagePairs = count(UserLanguagePair::where('user_id', $user)->get());
        $LanguagePairStatus['LanguagePairStatus'] = array();
        if($countLanguagePairs < 1){
            $languagePairStatus = array('LanguagePairStatus' => 'danger');
        }
        elseif($countLanguagePairs < 2){
            $languagePairStatus = array('LanguagePairStatus' => 'warning');
        }
        elseif($countLanguagePairs >= 2){
            $languagePairStatus = array('LanguagePairStatus' => 'success');
        }
        $LanguagePairStatus = array_merge($languagePairStatus);
        // dd($LanguagePairStatus);
        return $LanguagePairStatus;
    }
}
