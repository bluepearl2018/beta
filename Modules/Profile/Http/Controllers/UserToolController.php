<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserToolRequest;
use Modules\Profile\Repositories\UserToolRepository;
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

use Modules\Profile\Http\Requests\UserToolRequest as StoreRequest;
use Modules\Profile\Http\Requests\UserToolRequest as UpdateRequest;

class UserToolController extends Controller
{
    /** @var  UserToolRepository */
    private $userToolRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserToolRepository $userToolRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userToolRepository = $userToolRepo;
    }

    /**
     * Display a listing of the UserTool.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        $userTools = $this->userToolRepository->getToolsForCurrentUser($currentUser);

        return view('profile::userTools.index')
            ->with($userTools);
    }

    /**
     * Show the form for creating a new UserTool.
     *
     * @return Response
     */
    public function create(UserToolRequest $request)
    {
        $currentUser = Auth::User()->id;
        $maxToolForUser = $this->userRepository->maxToolForUser($currentUser);
        $countTools = $this->userToolRepository->countToolsForCurrentUser($currentUser);
        $currentUserToolCount = $countTools['countTools'];

        $remainingTools = $maxToolForUser-$currentUserToolCount;
        if($currentUserToolCount == $maxToolForUser){
            Flash::error(trans('action.creationLimitReached'));
        }
        elseif($currentUserToolCount < $maxToolForUser){
            Flash::success('Vous pouvez encore ajouter '.$remainingTools.' outil(s).');
        }
        return view('profile::userTools.create');
    }

    /**
     * Store a newly created UserTool in storage.
     *
     * @param CreateUserToolRequest $request
     *
     * @return Response
     *//**
     * Store a newly created UserTool in storage.
     *
     * @param CreateUserToolRequest $request
     *
     * @return Response
     */

    /**
     * Store a newly created UserTool in storage.
     *
     * @param CreateUserToolRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $currentUser = \Auth::User()->id;
        $checkTool = \Modules\Profile\Entities\UserTool::where('user_id', $currentUser)
        ->where('tool_id', $validated['tool_id'])
        ->first();
        // dd($checkTool);
        if(!empty($checkTool)){
            Flash::error(trans('users.userToolAlreadyRegistered'));
            return view('profile::userTools.create');
        }
        elseif(empty($checkTool))
        {   
            $user = ['user_id' => $currentUser];
            $validated_array = array_merge($validated, $user);
            // dd($validated_array);
            \Modules\Profile\Entities\UserTool::create($validated_array);
            Flash::success(trans('users.userToolAdded'));
            return redirect(route('users-tools.index'));
        }
    }

    public function toggleVisibility(Request $request)
    {
        $toolId = Crypt::decrypt($request['tool_id']);
        $row2update = \Modules\Profile\Entities\UserTool::find($toolId);
        
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userToolNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect(route('users-tools.index'));
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect(route('users-tools.index'));
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $toolId = Crypt::decrypt($request['tool_id']);
        $row2update = \Modules\Profile\Entities\UserTool::find($toolId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userToolNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect(route('users-tools.index'));
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect(route('users-tools.index'));
            }
            return redirect('/profile');
        }
        Flash::error('Petit problème');
    }

    /**
     * Show the form for editing the specified UserTool.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userTool = \Modules\Profile\Entities\UserTool::find($id);

        if (empty($userTool)) {
            Flash::error(trans('users.userToolNotFound'));
            return redirect(route('users-tools.index'));
        }

        return view('profile::userTools.edit')->with('userTool', $userTool);
    }

    /**
     * Update the specified UserTool in storage.
     *
     * @param  int              $id
     * @param UpdateUserToolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserToolRequest $request)
    {
        $userTool = \Modules\Profile\Entities\UserTool::find($id);

        if (empty($userTool)) {
            Flash::error(trans('users.userToolNotFound'));
            return redirect(route('users-tools.index'));
        }
        // TODO : check all update methods for user controllers
        // Some of them allow update.
        $userTool = $this->userToolRepository->update($request->all(), $id);
        Flash::error(trans('users.userToolUpdated'));
        return redirect(route('users-tools.index'));
    }

    /**
     * Remove the specified UserTool from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userTool = \Modules\Profile\Entities\UserTool::find($id);
        if(Auth::Check()){
            if (empty($userTool) && Auth::User()->id == $userTool->user_id){
                Flash::error(trans('users.userToolNotFound'));
                return redirect(route('users-tools.index'));
            }
            elseif(!empty($userTool) && $userTool->status_id == 1 && Auth::User()->id == $userTool->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-tools.index'));
            }
            elseif(!empty($userTool) && $userTool->status_id == 0 && Auth::User()->id == $userTool->user_id){
                \Modules\Profile\Entities\UserTool::destroy($id);
                Flash::error(trans('users.userToolDeleted'));
                return redirect(route('users-tools.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-tools.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
