<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserOrganizationRequest;
use Modules\Profile\Repositories\UserOrganizationRepository;
use Modules\Profile\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Flash;
use Auth;
use Crypt;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

use Modules\Profile\Http\Requests\UserOrganizationRequest as StoreRequest;

class UserOrganizationController extends Controller
{
    /** @var  UserOrganizationRepository */
    private $userOrganizationRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserOrganizationRepository $userOrganizationRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userOrganizationRepository = $userOrganizationRepo;
    }

    /**
     * Display a listing of the UserOrganization.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        $userOrganizations = $this->userOrganizationRepository->getOrganizationsForCurrentUser($currentUser);

        return view('profile::userOrganizations.index')
            ->with($userOrganizations);
    }

    /**
     * Show the form for creating a new UserOrganization.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile::userOrganizations.create');
    }

    /**
     * Store a newly created UserOrganization in storage.
     *
     * @param CreateUserOrganizationRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $currentUser = \Auth::User()->id;
            
        $checkOrganization = \Modules\Profile\Entities\UserOrganization::where('user_id', $currentUser)
        ->where('organization_id', $validated['organization_id'])
        ->first();

        // dd($checkTool);
        if(!empty($checkOrganization)){
            Flash::error(trans('users.userOrganizationAlreadyRegistered'));
            return view('users.user_organizations.create');
        }
        elseif(empty($checkOrganization))
        {   
            $user = ['user_id' => $currentUser];
            $validated_array = array_merge($validated, $user);
            // dd($validated_array);
            \Modules\Profile\Entities\UserOrganization::create($validated_array);
            Flash::error(trans('users.userOrganizationAdded'));
            return redirect(route('users-organizations.index'));
        }
    }


    public function toggleVisibility(Request $request)
    {
        $organizationId = Crypt::decrypt($request['organization_id']);
        $row2update = \Modules\Profile\Entities\UserOrganization::find($organizationId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userOrganizationNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect(route('users-organizations.index'));
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect(route('users-organizations.index'));
            }
            return redirect(route('users-organizations.index'));
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $organizationId = Crypt::decrypt($request['organization_id']);
        $row2update = \Modules\Profile\Entities\UserOrganization::find($organizationId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userOrganizationNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect(route('users-organizations.index'));
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect(route('users-organizations.index'));
            }
            return redirect(route('users-organizations.index'));
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }


    /**
     * Sends user to a sugget form.
     *
     * @param  int $id
     *
     * @return Response
     */

    
    public function suggest(){
        Flash::message('La fonction de suggestion d\'organisation est en cours de développement. Pour toute 
        suggestion de nouvelle organisation, contacter le gestionnaire du réseau');
        return redirect('/profile');
    }
    /**
     * Remove the specified UserOrganization from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userOrganization = \Modules\Profile\Entities\UserOrganization::find($id);
        if(Auth::Check()){
            if (empty($userOrganization) && Auth::User()->id == $userOrganization->user_id){
                Flash::error(trans('users.userOrganizationNotFound'));
                return redirect(route('users-organizations.index'));
            }
            elseif(!empty($userOrganization) && $userOrganization->status_id == 1 && Auth::User()->id == $userOrganization->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-organizations.index'));
            }
            elseif(!empty($userOrganization) && $userOrganization->status_id == 0 && Auth::User()->id == $userOrganization->user_id){
                UserOrganization::destroy($id);
                Flash::success(trans('users.userOrganizationDeleted'));
                return redirect(route('users-organizations.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-organizations.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
