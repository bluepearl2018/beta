<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\Models\User;
use \Modules\UitTables\Entities\Socialmedia;
use \Modules\UitTables\Entities\Tool;
use App\Http\Controllers\Controller as BaseController;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Auth;
use Crypt;
use \Modules\Pool\Repositories\PoolRepository;
use \Modules\Profile\Repositories\FileUserRepository;
use \Modules\Profile\Repositories\UserCertificateRepository;
use \Modules\Profile\Repositories\UserServiceRepository;
use \Modules\Profile\Repositories\UserSocialmediaRepository;
use \Modules\Profile\Repositories\UserToolRepository;
use \Modules\Profile\Repositories\UserPoolRepository;
use \Modules\Profile\Repositories\UserProfileRepository;
use \Modules\Profile\Repositories\UserSubscriptionRepository;
use \Modules\Profile\Repositories\UserLanguagePairRepository;
use \Modules\Profile\Repositories\UserOrganizationRepository;

    
class ProfileController extends BaseController
{

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
            $this->middleware('auth');
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('profile::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('profile::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function showPublicProfile(Request $request)
    {
        $selectedUser = \App\Models\User::where('id', Crypt::decrypt($request->user_request))->first();
        $userProfile = \Modules\Profile\Entities\UserProfile::where('user_id', Crypt::decrypt($request->user_request))->first();
        $selectedUserId = Crypt::decrypt($request->user_request);
        
        // dd($selectedUser);
        $userLanguagePairs = $this->userLanguagePairRepository->getLanguagePairsForCurrentUser($selectedUserId);
        $countLanguagePairs = $userLanguagePairs['countLanguagePairs'];
        $countVisibleLanguagePairs = $userLanguagePairs['countVisibleLanguagePairs'];
        // dd($userLanguagePairs);

        $userSocialmedias = $this->userSocialmediaRepository->getSocialMediasForCurrentUser($selectedUserId);
        $countSocialmedias = $userSocialmedias['countSocialmedias'];
        $countVisibleSocialmedias = $userSocialmedias['countVisibleSocialmedias'];
        // dd($userSocialmedias);

        $userServices = $this->userServiceRepository->getServicesForCurrentUser($selectedUserId);
        $countServices = $userServices['countServices'];
        $countVisibleServices = $userServices['countVisibleServices'];
        // dd($userServices);

        $userTools = $this->userToolRepository->getToolsForCurrentUser($selectedUserId);
        $countTools = $userTools['countTools'];
        $countVisibleTools = $userTools['countVisibleTools'];
        // dd($userTools);

        $userFiles = $this->fileUserRepository->getFilesForCurrentUser($selectedUserId);
        $countFiles = $userFiles['countFiles'];
        $countVisibleFiles = $userFiles['countVisibleFiles'];
        // dd($userFiles);
        
        $userCertificates = $this->userCertificateRepository->getCertificatesForCurrentUser($selectedUserId);
        $countCertificates = $userCertificates['countCertificates'];
        $countVisibleCertificates = $userCertificates['countVisibleCertificates'];
        // dd($userCertificates);

        $userPools = $this->userPoolRepository->getPoolsForCurrentUser($selectedUserId);
        $countPools = $userPools['countPools'];
        $countVisiblePools = $userPools['countVisiblePools'];
        // dd($userPools);
        
        $userOrganizations = $this->userOrganizationRepository->getOrganizationsForCurrentUser($selectedUserId);
        $countOrganizations = $userOrganizations['countOrganizations'];
        $countVisibleOrganizations = $userOrganizations['countVisibleOrganizations'];
        // dd($userOrganization);

        // dd($decryptedid);
        // dd($userTool);
        if (!isset($selectedUser) || empty($selectedUser) || is_null($userProfile)) {
            Flash::error(trans('profile.userProfileNotAvailableComeBackLater'));
            return redirect('/pools');
        }
        elseif(isset($selectedUser) && !is_null($userProfile)){
            return view('profile::show')->with(compact('selectedUser', 'userProfile', 'userTools', 'userServices', 
            'countTools', 'countLanguagePairs', 'userLanguagePairs', 'userFiles', 'countFiles', 'userSocialmedias', 'countSocialmedias', 'countServices', 
            'countOrganizations','userPools', 'countPools', 'userOrganizations', 'countVisibleOrganizations', 'countVisibleFiles', 'countVisibleSocialmedias', 'countVisibleTools', 'countVisiblePools', 
            'countVisibleServices', 'userCertificates', 'countVisibleCertificates', 'countCertificates', 'countVisibleLanguagePairs'));
        }
        abort('500');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('profile::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
