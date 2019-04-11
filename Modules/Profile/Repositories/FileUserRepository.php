<?php

namespace Modules\Profile\Repositories;

use App\Models\File;
use App\Models\FileType;
use Modules\Profile\Entities\FileUser;

class FileUserRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'file_id',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FileUser::class;
    }

    public function getFilesForCurrentUser($user_id)
    {
        $userFiles = FileUser::where('user_id', $user_id)->get();
        $countFiles = count($userFiles);
        $countActiveFiles = count($userFiles->where('status_id', '1'));
        $countVisibleFiles = count($userFiles->where('visibility_id', '1'));
        $OrganizationStatus = $this->getFileStatus($user_id);
        return compact('userFiles', 'countFiles', 'countActiveFiles', 'countVisibleFiles', 'OrganizationStatus');
        FileUser::where('user_id', $user_id)->get();
    }

    
    /** GENERAL STATISTICS */
    public function countFilesForCurrentUser($user_id)
    {
        return count(FileUser::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleFilesForCurrentUser($user_id)
    {
        return FileUser::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleFilesForCurrentUser($user_id)
    {
        return count(FileUser::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveFilesForCurrentUser($user_id)
    {
        return count(FileUser::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function getFileStatus($user_id)
    {
        // dd($user_id);
        $countFiles = count(FileUser::where('user_id', $user_id)->get());
        // dd($countFiles);
        $FileStatus['FileStatus'] = array();
        if($countFiles < 1){
            $fileStatus = array('FileStatus' => 'danger');
        }
        elseif($countFiles >= 1){
            $fileStatus = array('FileStatus' => 'warning');
        }
        elseif($countFiles > 2){
            $fileStatus = array('FileStatus' => 'success');
        }
        $FileStatus = array_merge($fileStatus);
        // dd($FileStatus);
        return $FileStatus;
    }
}
