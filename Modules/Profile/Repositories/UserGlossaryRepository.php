<?php

namespace Modules\Profile\Repositories;

use App\Models\File;
use App\Models\FileType;
use App\Models\UserGlossary;

class UserGlossaryRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'glossary_id',
        'glossary_title',
        'glossary_path',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserGlossary::class;
    }

    public function getGlossariesForCurrentUser($user_id)
    {
        return UserGlossary::where('user_id', $user_id)->get();
    }

    
    /** GENERAL STATISTICS */
    public function countGlossariesForCurrentUser($user_id)
    {
        return count(UserGlossary::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleGlossariesForCurrentUser($user_id)
    {
        return UserGlossary::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleGlossariesForCurrentUser($user_id)
    {
        return count(UserGlossary::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveGlossariesForCurrentUser($user_id)
    {
        return count(UserGlossary::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function getGlossaryStatus($user_id)
    {
        // dd($user_id);
        $countGlossaries = count(UserGlossary::where('user_id', $user_id)->get());
        // dd($countGlossaries);
        $GlossaryStatus['GlossaryStatus'] = array();
        if($countGlossaries < 1){
            $glossaryStatus = array('GlossaryStatus' => 'danger');
        }
        elseif($countGlossaries <= 2){
            $glossaryStatus = array('GlossaryStatus' => 'warning');
        }
        elseif($countGlossaries > 2){
            $glossaryStatus = array('GlossaryStatus' => 'success');
        }
        $GlossaryStatus = array_merge($glossaryStatus);
        // dd($GlossaryStatus);
        return $GlossaryStatus;
    }
}
