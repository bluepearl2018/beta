<?php

namespace Modules\Profile\Repositories;

use App\Models\File;
use App\Models\FileType;
use App\Models\UserMemory;

class UserMemoryRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'memory_id',
        'memory_title',
        'memory_path',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserMemory::class;
    }

    public function getMemoriesForCurrentUser($user_id)
    {
        return UserMemory::where('user_id', $user_id)->get();
    }

    
    /** GENERAL STATISTICS */
    public function countMemoriesForCurrentUser($user_id)
    {
        return count(UserMemory::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleMemoriesForCurrentUser($user_id)
    {
        return UserMemory::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleMemoriesForCurrentUser($user_id)
    {
        return count(UserMemory::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveMemoriesForCurrentUser($user_id)
    {
        return count(UserMemory::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function getMemoryStatus($user_id)
    {
        // dd($user_id);
        $countMemories = count(UserMemory::where('user_id', $user_id)->get());
        // dd($countMemories);
        $MemoryStatus['MemoryStatus'] = array();
        if($countMemories < 1){
            $memoryStatus = array('MemoryStatus' => 'danger');
        }
        elseif($countMemories <= 2){
            $memoryStatus = array('MemoryStatus' => 'warning');
        }
        elseif($countMemories > 2){
            $memoryStatus = array('MemoryStatus' => 'success');
        }
        $MemoryStatus = array_merge($memoryStatus);
        // dd($MemoryStatus);
        return $MemoryStatus;
    }
}
