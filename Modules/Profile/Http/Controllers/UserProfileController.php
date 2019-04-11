<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\User;
use \App\Models\Socialmedia;
use \App\Models\Tool;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use \App\Repositories\PoolRepository;
use \App\Repositories\FileUserRepository;
use \Modules\Profile\Repositories\UserCertificateRepository;
use \Modules\Profile\Repositories\UserServiceRepository;
use \Modules\Profile\Repositories\UserSocialmediaRepository;
use \Modules\Profile\Repositories\UserToolRepository;
use \Modules\Profile\Repositories\UserPoolRepository;
use \Modules\Profile\Repositories\UserProfileRepository;
use \Modules\Profile\Repositories\UserSubscriptionRepository;
use \Modules\Profile\Repositories\UserLanguagePairRepository;
use \Modules\Profile\Repositories\UserOrganizationRepository;

class UserProfileController extends Controller
{
    /**
     * Display & Manage User Profile.
     *
     * @return void
     */

    public function __construct(
        FileUserRepository $fileUserRepo,
        UserCertificateRepository $userCertificateRepo,
        UserSocialmediaRepository $userSocialmediaRepo, 
        UserToolRepository $userToolRepo, 
        UserLanguagePairRepository $userLanguagePairRepo, 
        UserOrganizationRepository $userOrganizationRepo, 
        UserSubscriptionRepository $userSubscriptionRepo, 
        PoolRepository $poolRepo, 
        UserServiceRepository $userServiceRepo, 
        UserPoolRepository $userPoolRepo, 
        UserProfileRepository $userProfileRepo)
        {
            $this->poolRepository = $poolRepo;
            $this->fileUserRepository = $fileUserRepo;
            $this->userPoolRepository = $userPoolRepo;
            $this->userServiceRepository = $userServiceRepo;
            $this->userProfileRepository = $userProfileRepo;
            $this->userSocialmediaRepository = $userSocialmediaRepo;
            $this->userToolRepository = $userToolRepo;
            $this->userLanguagePairRepository = $userLanguagePairRepo;
            $this->userSubscriptionRepository = $userSubscriptionRepo;
            $this->userOrganizationRepository = $userOrganizationRepo;
            $this->userCertificateRepository = $userCertificateRepo;
            $this->middleware(['auth', 'verified']);
        }


    /**
     * Returen welcome page for User Management profile
     *
     * @return void
     */

    public function index(Request $request)
    {	
        
        $userProfile = \Modules\Profile\Entities\UserProfile::where('user_id', Auth::User()->id)->firstOrFail();
        $selectedUser = Auth::User();
        $user_id = Auth::User()->id;
        
        // dd($user_id);
        $userLanguagePairs = $this->userLanguagePairRepository->getVisibleLanguagePairsForCurrentUser($user_id);
        $countLanguagePairs = $this->userLanguagePairRepository->countLanguagePairsForCurrentUser($user_id);
        $countVisibleLanguagePairs = $this->userLanguagePairRepository->countVisibleLanguagePairsForCurrentUser($user_id);
        // dd($userLanguagePairs);

        $userSocialmedias = $this->userSocialmediaRepository->getVisibleSocialMediasForCurrentUser($user_id);
        $countSocialmedias = $this->userSocialmediaRepository->countSocialMediasForCurrentUser($user_id);
        $countVisibleSocialmedias = $this->userSocialmediaRepository->countVisibleSocialMediasForCurrentUser($user_id);
        // dd($userSocialmedias);

        $userServices = $this->userServiceRepository->getVisibleServicesForCurrentUser($user_id);
        $countServices = $this->userServiceRepository->countServicesForCurrentUser($user_id);
        $countVisibleServices = $this->userServiceRepository->countVisibleServicesForCurrentUser($user_id);
        // dd($userTools);

        $userTools = $this->userToolRepository->getVisibleToolsForCurrentUser($user_id);
        $countTools = $this->userToolRepository->countToolsForCurrentUser($user_id);
        $countVisibleTools = $this->userToolRepository->countVisibleToolsForCurrentUser($user_id);
        // dd($userTools);

        $userFiles = $this->fileUserRepository->getVisibleFilesForCurrentUser($user_id);
        $countFiles = $this->fileUserRepository->countFilesForCurrentUser($user_id);
        $countVisibleFiles = $this->fileUserRepository->countVisibleFilesForCurrentUser($user_id);
        // dd($userFiles);

        $userCertificates = $this->userCertificateRepository->getVisibleCertificatesForCurrentUser($user_id);
        $countCertificates = $this->userCertificateRepository->countCertificatesForCurrentUser($user_id);
        $countVisibleCertificates = $this->userCertificateRepository->countVisibleCertificatesForCurrentUser($user_id);
        // dd($userFiles);

        $userPools = $this->userPoolRepository->getVisiblePoolsForCurrentUser($user_id);
        $countPools = $this->userPoolRepository->countPoolsForCurrentUser($user_id);
        $countVisiblePools = $this->userPoolRepository->countVisiblePoolsForCurrentUser($user_id);
        
        $userOrganizations = $this->userOrganizationRepository->getVisibleOrganizationsForCurrentUser($user_id);
        $countOrganizations = $this->userOrganizationRepository->countOrganizationsForCurrentUser($user_id);
        $countVisibleOrganizations = $this->userOrganizationRepository->countVisibleOrganizationsForCurrentUser($user_id);

        // dd($userOrganization);
        // dd($decryptedid);
        // dd($userTool);
        if (!isset($selectedUser) || empty($selectedUser) || is_null($userProfile)) {
            Flash::error(trans('profile.userProfileNotAvailable'));
            
        }
        
        return view('users.users_profile.users_profile_premium')->with(compact('selectedUser', 'userProfile', 'userTools', 'userServices', 
        'countTools', 'countLanguagePairs', 'userLanguagePairs', 'userFiles', 'countFiles', 'userSocialmedias', 'countSocialmedias', 'countServices', 
        'countOrganizations','userPools', 'countPools', 'userOrganizations', 'countVisibleOrganizations', 'countVisibleFiles', 'countVisibleSocialmedias', 'countVisibleTools', 'countVisiblePools', 
        'countVisibleServices', 'userCertificates', 'countVisibleCertificates', 'countCertificates', 'countVisibleLanguagePairs'));
	}
}
