<?php

namespace Modules\Profile\Repositories;

use \Modules\Profile\Entities\UserTool;
use \App\Models\Tool;
use Auth;

class UserToolRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'tool_id',
        'visibility_id',
        'tool_token',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserTool::class;
    }
    
    public function getToolsForCurrentUser($user_id)
    {
        $userTools = UserTool::where('user_id', $user_id)->get();       
        $countTools = $userTools->count();
        $countActiveTools = count($userTools->where('status_id', 1));
        $countVisibleTools = count($userTools->where('visibility_id', 1));
        $ToolStatus = $this->getToolStatus($user_id);
        return compact('userTools', 'countTools', 'countActiveTools', 'countVisibleTools', 'ToolStatus');
 
    }


    /** GENERAL STATISTICS */
    public function countToolsForCurrentUser($user_id)
    {
        return count(UserTool::where('user_id', $user_id)->pluck('id'));
    }
    

    /** FOR PRIVATE PROFILE */

    public function countActiveToolsForCurrentUser($user_id)
    {
        return count(UserTool::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->pluck('id'));
    }

    public function getToolStatus($user)
    {
        $countTools = count(UserTool::where('user_id', Auth::User()->id)
        ->where('status_id', '=', '1')
        ->pluck('id'));
        $ToolStatus['ToolStatus'] = array();
        if($countTools < 1){
            $toolStatus = array('ToolStatus' => 'danger');
        }
        elseif($countTools >= 1){
            $toolStatus = array('ToolStatus' => 'success');
        }
        $ToolStatus = array_merge($toolStatus);
        // dd($ToolStatus);
        return $ToolStatus;
    }
}
