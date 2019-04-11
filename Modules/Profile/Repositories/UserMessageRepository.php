<?php

namespace Modules\Profile\Repositories;

use \Modules\Profile\Entities\UserMessage as UserMessage;

/**
 * Interface UserMessageRepository.
 *
 * @package namespace App\Repositories;
 */
class UserMessageRepository
{
    /**
     * @var array
     */
    
    protected $fieldSearchable = [
        'user_id', 
        'recipient_id', 
        'flagged_id', 
        'created_at', 
        'read_at', 
        'subject', 
        'body', 
        'deleted_at'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    public function model(){
        return UserMessage::all();
    }

    public function countUnreadMessagesForCurrentUser($user){
        return count(UserMessage::where('recipient_id', $user)
        ->where('deleted_at', NULL)
        ->where('read_at', NULL)
        ->where('flagged_id', FALSE)
        ->get());
    }
}
