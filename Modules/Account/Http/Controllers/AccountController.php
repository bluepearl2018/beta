<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\UserProfile;
use Modules\Account\Http\Requests\UserProfileRequest;

use \App\Repositories\UserRepository;
use \Modules\Account\Repositories\UserProfileRepository;

use Illuminate\Foundation\Http\FormRequest;
use \App\Http\Controllers\Controller as BaseController;
use Crypt;
use \Laracasts\Flash\Flash;
use \App\Models\User;
use Auth;
use View;

class AccountController extends BaseController
{

    /** @var  UserProfileRepository */
    private $userProfileRepository;
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(
        UserProfileRepository $userProfileRepo, 
        UserRepository $userRepository)
    {
        $this->userProfileRepository = $userProfileRepo;
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    /**
     * Display the welcome Page for the UserProfile.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userProfile = UserProfile::where('user_id', Auth::User()->id)->first();
        if(!is_null($userProfile))
        {
            return view('account::index', $userProfile)->with(compact('userProfile'));
        }
        
        return redirect('/account/create');
    }

    /**
     * Show the form for creating a new UserProfile.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::user()->id;
        $userProfile = $this->userProfileRepository::where('user_id', $currentUser)->first();
        if (!is_null($userProfile)) {
            Flash::message(trans('account.accountAlreadyCreated'));
            return $this->edit();
        }
        return view('account::create')->with('userProfile', $userProfile);
    }

    /**
     * Store a newly created UserProfile in storage.
     *
     * @param CreateUserProfileRequest $request
     *
     * @return Response
     */
    public function store(UserProfileRequest $request)
    {
        $input = $request->all();
        $userProfile = new UserProfile;
        $userProfile->create($input);

        // If no role has been assigned yet... assign basic role
        // in order to start using advanced functions (recruitement + toolbox)
        
        if(count(Auth::User()->getRoleNames()) < 1){
            if(Auth::User()->register_as == '7'){
                Auth::User()->assignRole('vendor', 'premium');
            }
            elseif(Auth::User()->register_as == '9'){
                Auth::User()->assignRole('dtper', 'premium');
            }
            elseif(Auth::User()->register_as == '16'){
                Auth::User()->assignRole('developer', 'premium');
            }
            elseif(Auth::User()->register_as == '22'){
                Auth::User()->assignRole('proorg', 'premium');
            }
            elseif(Auth::User()->register_as == '23'){
                Auth::User()->assignRole('academic', 'premium');
            }
        }

        Flash::success('Eutranet a ajouté ces données à votre compte d\'utilisateur.');
        return redirect('account/')->with('userProfile', $userProfile);
    }

    /**
     * Display the specified UserProfile.
     *
     * @param  int $id
     *
     * @return Response
     */

    public function show($id)
    {
        $currentUser = Auth::user()->id;
        // dd($currentUser);
        $userProfile = $this->userProfileRepository->model()::where('user_id', $currentUser)->first();
        // var_dump($userProfile);
        if (empty($userProfile)) {
            Flash::error(trans('account.accountNotCreatedYet'));
            return redirect('account/edit');
        }
        Flash::message(trans('account.hereAreYourAccountsData'));
        return view('auth.my_account')->with('userProfile', $userProfile);
    }

    /**
     * Show the form for editing the specified UserProfile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit()
    {
        $currentUser = Auth::user()->id;
        // dd($currentUser);
        $userProfile = $this->userProfileRepository::getUserProfileForCurrentUser($currentUser);
        
        if (empty($userProfile)) {
            Flash::error(trans('account.accountNotCreatedYet'));
            return $this->create();
        }

        return view('account::edit')->with('userProfile', $userProfile);
    }

    /**
     * Update the specified UserProfile in storage.
     *
     * @param  int              $id
     * @param UpdateUserProfileRequest $request
     *
     * @return Response
     */
    public function update(UserProfileRequest $request)
    {
        $input = $request->all();
        // TODO 2 : remove temporary full options after commercial go-live
        $userProfile = $this->userProfileRepository::getUserProfileForCurrentUser(Auth::User()->id);
        $userProfile->update($input);
        Flash::success('account.accountSuccessfullyUpdated.');
        return redirect('/account');
    }
    
    public function visibilityOff(Request $request)
    {
        // dd('willing to toggle off');
        $userCheck = $request->user_request;
        // dd($userCheck);
        if(isset($userCheck) && auth()->user()->firstname == Crypt::decrypt($userCheck))
        {
            $id = auth()->user()->id;
            $descryptedUserCheck = Crypt::decrypt($userCheck); 
            $user2Update = $this->userRepository->model()::where('id', '=', $id)->first();
            // dd($user2Update);
            if($descryptedUserCheck == auth()->user()->firstname){
                $user2Update = $this->userRepository->model()::where('id', '=', $id)->first();
                $user2Update->visibility_id = FALSE;
                $user2Update->save();
                Flash::success(trans('account.accountNoInvisible'));
                return redirect('account/');
            }
            elseif($descryptedUserCheck !== auth()->user()->firstname){
                Flash::error(trans('interface.aProblemOccurred')); 
                return redirect('/');
            }
        }
        elseif(isset($userCheck) && auth()->user()->firstname !== Crypt::decrypt($userCheck))
        {
            Session::flush();
        }
    }

    public function visibilityOn(Request $request)
    {
        // dd('willing to toggle on');
        $userCheck = $request->user_request;
        if(isset($userCheck) && auth()->user()->firstname == Crypt::decrypt($userCheck))
        {
            $id = auth()->user()->id;
            $descryptedUserCheck = Crypt::decrypt($userCheck); 
            if($descryptedUserCheck == auth()->user()->firstname){
                
                $user2Update = $this->userRepository->model()::where('id', '=', $id)->first();
                $user2Update->visibility_id = TRUE;
                $user2Update->save();
                Flash::success(trans('account.accountNowVisible'));
                return redirect('account/');
            }
            elseif($descryptedUserCheck !== auth()->user()->firstname){
                Flash::error(trans('interface.aProblemOccurred')); 
                return redirect('/');
            }
        }
        elseif(isset($userCheck) && auth()->user()->firstname !== Crypt::decrypt($userCheck))
        {
            Flash::error(trans('inteface.operationNotAuthorized'));
            Session::flush();
        }
    }

    /**
     * SOFT Deletes user account
     *
     * @param  int $id
     *
     * @return Response
     */
    public function deleteAccount(Request $request)
    {
        if(Auth::Check() && !Auth::User()->hasRole('admin') && is_null(auth()->user()->deleted_at) && Auth::User()->status_id == FALSE){
            
            $userCheck = $request->user_request;
            if(isset($userCheck) && auth()->user()->firstname == Crypt::decrypt($userCheck))
            {
                if(auth()->user()->visibility_id == 1){
                    Flash::warning(trans('action.setToInvisibleFirst'));
                    return redirect('/account');
                }
                elseif(auth()->user()->visibility_id == 0){
                    $id = auth()->user()->id;
                    $descryptedUserCheck = Crypt::decrypt($userCheck); 
                    if($descryptedUserCheck == auth()->user()->firstname){
                        
                        $user2Update = User::where('id', '=', $id)
                        ->where('status_id', '0')
                        ->where('visibility_id', '0')
                        ->first();
                        $user2Update->delete();
                        // $user2Update->syncRoles(['unverified']);
                        // TODO : send delete email confirmation and so on
                        Flash::success(trans('account.accountNowDesactivated'));
                        return redirect()->back();

                    }
                    elseif($descryptedUserCheck !== auth()->user()->firstname){
                        Flash::error(trans('interface.operationNotAuthorized'));  
                        Session::flush();
                        return redirect('/');
                    }
                }
            }
            elseif(isset($userCheck) && auth()->user()->firstname !== Crypt::decrypt($userCheck))
            {
                Flash::error(trans('account.accountIsCorrupted')); 
                Session::flush();
                return redirect('/login');
            }
        }
        else{
            Flash::error(trans('account.impossibleToDeleteYourAccount'));
            return redirect('/account');
        }
    }
    /**
     * Activates user account
     *
     * @param  int $id
     *
     * @return Response
     */
    public function statusOn(Request $request)
    {
        if(Auth::Check() && !Auth::User()->hasRole('admin') && is_null(auth()->user()->deleted_at) && Auth::User()->status_id == FALSE){
            
            $userCheck = $request->user_request;
            if(isset($userCheck) && auth()->user()->firstname == Crypt::decrypt($userCheck))
            {
                if(!auth()->user()->visibility_id == 0){
                    $user2Update = User::where('id', '=', $id)
                        ->where('visibility_id', '1')
                        ->first();
                        $user2Update->visibility_id = '0';
                        $user2Update->save();
                    Flash::warning(trans('action.pleaseTryAgain'));
                    return redirect('/account');
                }
                elseif(auth()->user()->visibility_id == 0){
                    $id = auth()->user()->id;
                    $descryptedUserCheck = Crypt::decrypt($userCheck); 
                    if($descryptedUserCheck == auth()->user()->firstname){
                        
                        $user2Update = User::where('id', '=', $id)
                        ->where('status_id', '0')
                        ->where('visibility_id', '0')
                        ->first();
                        $user2Update->status_id = '1';
                        $user2Update->save();
                        // $user2Update->syncRoles(['unverified']);
                        // TODO : send delete email confirmation and so on
                        Flash::success(trans('account.accountNowDesactivated'));
                        return redirect()->back();

                    }
                    elseif($descryptedUserCheck !== auth()->user()->firstname){
                        Flash::error(trans('interface.aProblemOccurred'));  
                        Session::flush();
                        return redirect('/');
                    }
                }
            }
            elseif(isset($userCheck) && auth()->user()->firstname !== Crypt::decrypt($userCheck))
            {
                Flash::error(trans('account.accountCorrupted')); 
                Session::flush();
                return redirect('/login');
            }
        }
        else{
            Flash::error(trans('account.impossibleToDeleteYourAccount'));
            return redirect('/account');
        }
    }
    /**
     * Desactivates user account
     *
     * @param  int $id
     *
     * @return Response
     */
    public function statusOff(Request $request)
    {
        if(Auth::Check() && !Auth::User()->hasRole('admin') && is_null(auth()->user()->deleted_at) && Auth::User()->status_id == TRUE){
            
            $userCheck = $request->user_request;
            if(isset($userCheck) && auth()->user()->firstname == Crypt::decrypt($userCheck))
            {
                if(!auth()->user()->visibility_id == 0){
                    $user2Update = User::where('id', '=', $id)
                        ->where('visibility_id', '1')
                        ->first();
                        $user2Update->visibility_id = '0';
                        $user2Update->save();
                    Flash::warning(trans('action.pleasTryAgain'));
                    return redirect('/account');
                }
                elseif(auth()->user()->visibility_id == 0){
                    $id = auth()->user()->id;
                    $descryptedUserCheck = Crypt::decrypt($userCheck); 
                    if($descryptedUserCheck == auth()->user()->firstname){
                        
                        $user2Update = User::where('id', '=', $id)
                        ->where('status_id', '1')
                        ->where('visibility_id', '0')
                        ->first();
                        $user2Update->status_id = '0';
                        $user2Update->save();
                        // $user2Update->syncRoles(['unverified']);
                        // TODO : send delete email confirmation and so on
                        Flash::success('Votre compte est désactivé.');
                        return redirect()->back();

                    }
                    elseif($descryptedUserCheck !== auth()->user()->firstname){
                        Flash::error(trans('interface.operationNotAuthorized'));  
                        Session::flush();
                        return redirect('/');
                    }
                }
            }
            elseif(isset($userCheck) && auth()->user()->firstname !== Crypt::decrypt($userCheck))
            {
                Flash::error(trans('account.accountCorrupted')); 
                Session::flush();
                return redirect('/login');
            }
        }
        else{
            Flash::error(trans('account.impossibleToDesactivateYourAccount'));
            return redirect('/account');
        }
    }
}