<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserServiceRequest;
use Modules\Profile\Repositories\UserServiceRepository;

use Modules\Profile\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserService;
use Flash;
use Auth;
use Crypt;
use Response;
use Session;

use Modules\Profile\Http\Requests\UserServiceRequest as StoreRequest;
use Modules\Profile\Http\Requests\UserServiceRequest as UpdateRequest;


class UserServiceController extends Controller
{
    /** @var  UserServiceRepository */
    private $userServiceRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserServiceRepository $userServiceRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userServiceRepository = $userServiceRepo;
    }

    /**
     * Display a listing of the UserService.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        // dd($currentUser);
        $userServices = $this->userServiceRepository->getServicesForCurrentUser($currentUser);
        
        return view('profile::userServices.index')
            ->with($userServices);
    }

    /**
     * Show the form for creating a new UserService.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::User()->id;
        $maxServiceForUser = $this->userRepository->maxServiceForUser($currentUser);
        $currentUserServiceCount = $this->userServiceRepository->countServicesForCurrentUser($currentUser);
        $remainingServices = $maxServiceForUser-$currentUserServiceCount;
        if($currentUserServiceCount == $maxServiceForUser){
            Flash::error(trans('action.creationLimitReached'));
        }
        elseif($currentUserServiceCount < $maxServiceForUser){
            Flash::success('Vous pouvez encore ajouter '.$remainingServices.' service(s) compte
            tenu de votre niveau d\'abonnement.');
        }
        return view('users.user_services.create');

    }

    /**
     * Store a newly created UserService in storage.
     *
     * @param CreateUserServiceRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $currentUser = \Auth::User()->id;
        if(Auth::Check()){
            
            $checkService = \Modules\Profile\Entities\UserService::where('user_id', $currentUser)
            ->where('service_id', $validated['service_id'])
            ->first();

            // dd($checkService);
            if($checkService){
                Flash::error(trans('users.userServiceAlreadyRegisterd'));
                return view('users.user_services.create');
            }
            elseif(!$checkService)
            {   
                $user = ['user_id' => $currentUser];
                $validated_array = array_merge($validated, $user);
                // dd($validated_array);
                \Modules\Profile\Entities\UserService::create($validated_array);
                Flash::success(trans('users.userServiceAdded'));
                return redirect('zones/users/my-profile/users-services');
            }
        }
    }

    public function toggleVisibility(Request $request)
    {
        $serviceId = Crypt::decrypt($request['service_id']);
        $row2update = \Modules\Profile\Entities\UserService::find($serviceId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userServiceNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('zones/users/my-profile');
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('zones/users/my-profile');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $serviceId = Crypt::decrypt($request['service_id']);
        $row2update = \Modules\Profile\Entities\UserService::find($serviceId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userServiceNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('zones/users/my-profile');
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('zones/users/my-profile');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    /**
     * Show the form for editing the specified UserService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userService = UserService::find($id);

        if (empty($userService)) {
            Flash::error(trans('users.userServiceNotFound'));
            return redirect(route('users-services.index'));
        }

        return view('users.user_services.edit')->with('userService', $userService);
    }


    /**
     * Remove the specified UserService from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userService = UserService::find($id);
        if(Auth::Check()){
            if (empty($userService) && Auth::User()->id == $userService->user_id){
                Flash::error(trans('users.userServiceNotFound'));
                return redirect(route('users-services.index'));
            }
            elseif(!empty($userService) && $userService->status_id == 1 && Auth::User()->id == $userService->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-services.index'));
            }
            elseif(!empty($userService) && $userService->status_id == 0 && Auth::User()->id == $userService->user_id){
                UserService::destroy($id);
                Flash::success(trans('users.userServiceDeleted'));
                return redirect(route('users-services.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-services.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
