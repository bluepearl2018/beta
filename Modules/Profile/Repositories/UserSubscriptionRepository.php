<?php

namespace Modules\Profile\Repositories;

use Modules\Profile\Entities\UserSubscription;

/**
 * Class UserSubscriptionRepository
 * @package App\Repositories
 * @version December 3, 2018, 12:39 pm UTC
 *
 * @method UserSubscription findWithoutFail($id, $columns = ['*'])
 * @method UserSubscription find($id, $columns = ['*'])
 * @method UserSubscription first($columns = ['*'])
*/
class UserSubscriptionRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subscription_id',
        'user_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserSubscription::class;
    }
    public function getSubscriptionsForCurrentUser($user_id)
    {
        return UserSubscription::where('user_id', $user_id)->get();
    }
    public function countSubscriptionsForCurrentUser($user_id)
    {
        return count(UserSubscription::where('user_id', $user_id)->get());
    }
    public function countVisibleSubscriptionsForCurrentUser($user_id)
    {
        return count(UserSubscription::where('user_id', $user_id)
        ->where('visibility_id', '1')
        ->get());
    }
    public function countActiveSubscriptionsForCurrentUser($user_id)
    {
        return count(UserSubscription::where('user_id', $user_id)
        ->where('status_id', '1')
        ->get());
    }
}
