<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserPoolRequest;
use Modules\Profile\Repositories\UserPoolRepository;

use Modules\Profile\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserPool;
use DB;
use Flash;
use Auth;
use Crypt;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

use Modules\Profile\Http\Requests\UserPoolRequest as StoreRequest;
use Modules\Profile\Http\Requests\UserPoolRequest as UpdateRequest;
// use Modules\Profile\Http\Requests\UserPoolRequest as UpdateRequest;


class UserPoolController extends Controller
{
    /** @var  UserPoolRepository */
    private $userPoolRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserPoolRepository $userPoolRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userPoolRepository = $userPoolRepo;
    }

    /**
     * Display a listing of the UserPool.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        // dd($currentUser);
        $userPools = $this->userPoolRepository->getPoolsForCurrentUser($currentUser);
        
        return view('profile::userPools.index')
            ->with($userPools);
    }

    /**
     * Show the form for creating a new UserPool.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::User()->id;
        $maxPoolForUser = $this->userRepository->maxPoolForUser($currentUser);
        $currentUserPoolCount = $this->userPoolRepository->getPoolsForCurrentUser($currentUser)['countPools'];
        $remainingPools = $maxPoolForUser-$currentUserPoolCount;
        if($currentUserPoolCount == $maxPoolForUser){
            Flash::error(trans('action.creationLimitReached'));
        }
        elseif($currentUserPoolCount < $maxPoolForUser){
            Flash::success('Vous pouvez encore ajouter '.$remainingPools.' pool(s) compte
            tenu de votre niveau d\'abonnement.');
        }
        return view('profile::userPools.create');

    }

    /**
     * Store a newly created UserPool in storage.
     *
     * @param CreateUserPoolRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $currentUser = \Auth::User()->id;
        if(Auth::Check()){
            
            $checkPool = \Modules\Profile\Entities\UserPool::where('user_id', $currentUser)
            ->where('pool_id', $validated['pool_id'])
            ->first();

            // dd($checkPool);
            if($checkPool){
                Flash::error(trans('users.userPoolAlreadyRegistered'));
                return view('profile::userPools.create');
            }
            elseif(!$checkPool)
            {   
                $user = ['user_id' => $currentUser];
                $validated_array = array_merge($validated, $user);
                // dd($validated_array);
                \Modules\Profile\Entities\UserPool::create($validated_array);
                Flash::success(trans('users.userPoolAdded'));
                return redirect('/profile/users-pools');
            }
        }
    }

    public function toggleVisibility(Request $request)
    {
        $poolId = Crypt::decrypt($request['pool_id']);
        $row2update = \Modules\Profile\Entities\UserPool::find($poolId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userPoolNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('profile');
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('profile');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $poolId = Crypt::decrypt($request['pool_id']);
        $row2update = \Modules\Profile\Entities\UserPool::find($poolId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userPoolNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('profile');
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('profile');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    /**
     * Show the form for editing the specified UserPool.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userPool = UserPool::find($id);

        if (empty($userPool)) {
            Flash::error(trans('users.userPoolNotFound'));
            return redirect(route('users-pools.index'));
        }
        return view('users.user_pools.edit')->with('userPool', $userPool);
    }


    /**
     * Remove the specified UserPool from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userPool = UserPool::find($id);
        if(Auth::Check()){
            if (empty($userPool) && Auth::User()->id == $userPool->user_id){
                Flash::error(trans('users.userPoolNotFound'));
                return redirect(route('users-pools.index'));
            }
            elseif(!empty($userPool) && $userPool->status_id == 1 && Auth::User()->id == $userPool->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-pools.index'));
            }
            elseif(!empty($userPool) && $userPool->status_id == 0 && Auth::User()->id == $userPool->user_id){
                UserPool::destroy($id);
                Flash::success(trans('users.userPoolDeleted'));
                return redirect(route('users-pools.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-pools.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
