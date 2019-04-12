<?php

namespace Modules\Profile\Http\ViewComposers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use \Auth;
use \App\User;
use Modules\Account\Repositories\UserRepository;
use Modules\Profile\Repositories\FileUserRepository;
use Modules\Pool\Repositories\PoolRepository;
use Modules\Profile\Repositories\UserProfileRepository;
use Modules\Profile\Repositories\UserToolRepository;
use Modules\Profile\Repositories\UserPoolRepository;
use Modules\Profile\Repositories\UserServiceRepository;
use Modules\Profile\Repositories\UserTeamRepository;
use Modules\Profile\Repositories\UserLanguagePairRepository;
use Modules\Profile\Repositories\UserSocialmediaRepository;
use Modules\Profile\Repositories\UserSubscriptionRepository;
use Modules\Profile\Repositories\UserOrganizationRepository;
use Modules\Profile\Repositories\UserMessageRepository;
use Modules\Profile\Repositories\UserCertificateRepository;

class PrivateProfileComposer
{
    /** @var UserRepository */
    private $user;  
    /** @var FileUserRepository */
     private $fileUserRepository; 
    /** @var UserRepository */
     private $userRepository; 
     /** @var  UserSocialmediaRepository */
     private $userSocialmediaRepository;
     /** @var  UserServiceRepository */
     private $UserServiceRepository;
     /** @var  UserToolRepository */
     private $userToolRepository;
     /** @var  UserPoolUserRepository */
     private $userPoolRepository;
     /** @var  UserSubscriptionRepository */
     private $userSubscriptionRepository;
     /** @var  UserLanguagePairRepository */
     private $userLanguagePairRepository;
     /** @var  PoolRepository */
     private $poolRepository;
      /** @var UserProfileRepository */
     private $userProfileRepository;
     /** @var UserOrganizationRepository */
     private $userOrganizationRepo;
     /** @var UserTeamRepository */
     private $userTeamRepo;
     /** @var UserMessageRepository */
     private $userMessageRepo;
     /** @var UserCertificateRepository */
     private $userCertificateRepo;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository $userRepo
     * @return void
     */

    /*
    UserRepository $userRepo,
    FileUserRepository $fileUserRepo,
    PoolRepository $poolRepo,
    UserProfileRepository $userProfileRepo,
    UserSocialmediaRepository $userSocialmediaRepo, 
    UserServiceRepository $userServiceRepo, 
    UserToolRepository $userToolRepo, 
    UserLanguagePairRepository $userLanguagePairRepo, 
    UserOrganizationRepository $userOrganizationRepo, 
    UserSubscriptionRepository $userSubscriptionRepo, 
    UserPoolRepository $userPoolRepo,
    UserCertificateRepository $userCertificateRepo
    */

    public function __construct(User $user,
    UserRepository $userRepo,
    FileUserRepository $fileUserRepo,
    PoolRepository $poolRepo,
    UserProfileRepository $userProfileRepo,
    UserSocialmediaRepository $userSocialmediaRepo, 
    UserServiceRepository $userServiceRepo, 
    UserToolRepository $userToolRepo, 
    UserLanguagePairRepository $userLanguagePairRepo, 
    UserOrganizationRepository $userOrganizationRepo, 
    UserSubscriptionRepository $userSubscriptionRepo, 
    UserPoolRepository $userPoolRepo,
    UserMessageRepository $userMessageRepo,
    UserCertificateRepository $userCertificateRepo,
    UserTeamRepository $userTeamRepo)
    {
      $this->user = $user;
      $this->userRepository = $userRepo;
      $this->fileUserRepository = $fileUserRepo;
      $this->poolRepository = $poolRepo;
      $this->userProfileRepository = $userProfileRepo;
      $this->userSocialmediaRepository = $userSocialmediaRepo;
      $this->userTeamRepository = $userTeamRepo;
      $this->userServiceRepository = $userServiceRepo;
      $this->userToolRepository = $userToolRepo;
      $this->userLanguagePairRepository = $userLanguagePairRepo;
      $this->userPoolRepository = $userPoolRepo;
      $this->userSubscriptionRepository = $userSubscriptionRepo;
      $this->userOrganizationRepository = $userOrganizationRepo;
      $this->userMessageRepository = $userMessageRepo;
      $this->userCertificateRepository = $userCertificateRepo;
      
    }
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(Auth::check()){
        $selectedUser = Auth::User()->id;
        
        // Account
        $view->with('selectedUser', $this->userRepository->getCurrentUser($selectedUser));
        $view->with($this->userRepository->getCurrentUserAccountDetails($selectedUser));
        
        // Profile
        $view->with('userProfile', $this->userProfileRepository->getUserProfileByUserId($selectedUser));
        $view->with('profileInfo', $this->userProfileRepository->getUserProfileCompleteness($selectedUser));
        
        // Alerts
        $view->with('Alerts', array_merge(
          $this->userRepository->getUserStatus($selectedUser),
          $this->userRepository->getUserVisibility($selectedUser),
          $this->userRepository->getUserLevel($selectedUser),
          $this->userRepository->getUserVATStatus($selectedUser),
          $this->userProfileRepository->getUserProfileCompleteness($selectedUser), 
          $this->userLanguagePairRepository->getLanguagePairStatus($selectedUser),
          $this->userPoolRepository->getPoolStatus($selectedUser),
          $this->userToolRepository->getToolStatus($selectedUser),
          $this->userOrganizationRepository->getOrganizationStatus($selectedUser),
          $this->userSocialmediaRepository->getSocialMediaStatus($selectedUser)
      ));

        // LanguagePairs
        $view->with($this->userLanguagePairRepository->getLanguagePairsForCurrentUser($selectedUser));
        
        // Pools
        $view->with($this->userPoolRepository->getPoolsForCurrentUser($selectedUser));
        
        // Tools
        $view->with($this->userToolRepository->getToolsForCurrentUser($selectedUser));
        
        // Services
        $view->with($this->userServiceRepository->getServicesForCurrentUser($selectedUser));
        
        // Files
        $view->with($this->fileUserRepository->getFilesForCurrentUser($selectedUser));

        // Organizations
        $view->with($this->userOrganizationRepository->getOrganizationsForCurrentUser($selectedUser));

        // SocialMedias
        $view->with($this->userSocialmediaRepository->getSocialMediasForCurrentUser($selectedUser));
        
        /***
        // Team
        $view->with('userTeam', $this->userTeamRepository->getTeamForCurrentUser($selectedUser));
        $view->with('countTeam',  $this->userTeamRepository->countTeamForCurrentUser($selectedUser));
        $view->with('countAcceptedTeam',  $this->userTeamRepository->countAcceptedTeamForCurrentUser($selectedUser));
 
        // Subscriptions
        $view->with('userSubscriptions', $this->userSubscriptionRepository->getSubscriptionsForCurrentUser($selectedUser));
        $view->with('countSubscriptions',  $this->userSubscriptionRepository->countSubscriptionsForCurrentUser($selectedUser));
        $view->with('countVisibleSubscriptions',  $this->userSubscriptionRepository->countVisibleSubscriptionsForCurrentUser($selectedUser));
        $view->with('countActiveSubscriptions',  $this->userSubscriptionRepository->countActiveSubscriptionsForCurrentUser($selectedUser));
*/
        // Certificates
        $view->with($this->userCertificateRepository->getCertificatesForCurrentUser($selectedUser));
        
        // Emails
        $view->with('countUnreadMessages', $this->userMessageRepository->countUnreadMessagesForCurrentUser($selectedUser));
      }
    }
}
