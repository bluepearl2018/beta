<?php

namespace Modules\Account\Http\ViewComposers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use \Auth;
use \App\User;
use Modules\Account\Repositories\UserRepository;

class UserAccountComposer
{
    /** @var UserRepository */
    private $user;  
    /** @var UserRepository */
     private $userRepository; 

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository $userRepo
     * @return void
     */

    /*
    UserRepository $userRepo
    */

    public function __construct(User $user,
    UserRepository $userRepo)
    {
      $this->user = $user;
      $this->userRepository = $userRepo;      
    }
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $selectedUser = Auth::User()->id;
        // $view->with('userCheck', $this->userRepository->userCheck($selectedUser));
        $view->with('count', $this->userRepository->count());
        
        // Account
        $view->with('selectedUser', $this->userRepository->getCurrentUser($selectedUser));
        $view->with('isVisible', $this->userRepository->isVisible($selectedUser));
        $view->with('isActive', $this->userRepository->isActive($selectedUser));
        $view->with('isFree', $this->userRepository->isFree($selectedUser));
        $view->with('isPremium', $this->userRepository->isPremium($selectedUser));
        $view->with('isPremiumExclusive', $this->userRepository->isPremiumExclusive($selectedUser));
        $view->with('userVAT', $this->userRepository->getUserVAT($selectedUser));
        $view->with('hasVAT', $this->userRepository->hasVAT($selectedUser));
        
        // Alerts
        $view->with('Alerts', array_merge(
          $this->userRepository->getUserStatus($selectedUser),
          $this->userRepository->getUserVisibility($selectedUser),
          $this->userRepository->getUserLevel($selectedUser),
          $this->userRepository->getUserVATStatus($selectedUser)
      ));

    }
}
