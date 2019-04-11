<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserResourceRequest;
use Modules\Profile\Repositories\UserResourceRepository;

use Modules\Profile\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserResource;
use Flash;
use Auth;
use Crypt;
use Response;
use Session;

use Modules\Profile\Http\Requests\UserResourceRequest as StoreRequest;
use Modules\Profile\Http\Requests\UserResourceRequest as UpdateRequest;

// !!!!!!!!!!!! uses FILEUSER :: class /////////

class UserResourceController extends Controller
{
    /** @var  UserResourceRepository */
    private $userResourceRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserResourceRepository $userResourceRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userResourceRepository = $userResourceRepo;
    }

    /**
     * Display a listing of the UserCertificate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        // dd($currentUser);
        $userResources = $this->userResourceRepository->getResourcesForCurrentUser($currentUser);
        // dd($userResources);
        return view('profile::userResources.index')
            ->with($userResources);
    }

    /**
     * Show the form for creating a new UserCertificate.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::User()->id;
        $maxResourceForUser = $this->userRepository->maxResourceForUser($currentUser);
        $currentUserResourceCount = $this->userResourceRepository->countResourcesForCurrentUser($currentUser);
        $remainingResources = $maxResourceForUser-$currentUserResourceCount;
        if($currentUserResourceCount == $maxResourceForUser){
            Flash::error(trans('action.creationLimitReached'));
        }
        elseif($currentUserResourceCount < $maxResourceForUser){
            Flash::success('Vous pouvez encore ajouter '.$remainingResources.' ressource(s) documentaire(s) compte
            tenu de votre niveau d\'abonnement.');
        }
        return view('users.user_resources.create');

    }

    /**
     * Store a newly created UserCertificate in storage.
     *
     * @param CreateUserCertificateRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        // dd($request->validated());
        $validated = $request->validated();
        $currentUser = \Auth::User()->id;
        $currentUserPath = \Auth::User()->id.'-'.\Auth::User()->name.'\resources';
        if(Auth::Check()){
            // TODO : erreur sur checkResource -> changer ça
            // C'est plutôt une collection de TM que nous voulons
            // Il faut vérifier l'actualité des fichiers, etc.

                $user = ['user_id' => $currentUser];
                $resourceTitle = ['resource_title' => $request['resource_title']];
                $resourcePath = ['resource_path' => $request->file('upload_file')->store($currentUserPath)];
                $validated_array = array_merge($resourceTitle, $user, $resourcePath);
                // dd($validated_array);

                \App\Models\UserResource::create($validated_array);
                Flash::success(trans('users.userResourceAdded'));
                return redirect()->back();
        }
    }

    public function toggleVisibility(Request $request)
    {
        $resourceId = Crypt::decrypt($request['resource_id']);
        $row2update = \App\Models\UserResource::find($resourceId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userResourceNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('zones/users/projects/my-resources');
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('zones/users/projects/my-resources');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $resourceId = Crypt::decrypt($request['resource_id']);
        $row2update = \App\Models\UserResource::find($resourceId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userResourceNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('zones/users/projects/my-resources');
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('zones/users/projects/my-resources');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    /**
     * Show the form for editing the specified UserCertificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userResource = UserResource::find($id);

        if (empty($userResource)) {
            Flash::error(trans('users.userResourceNotFound'));
            return redirect(route('users-resources.index'));
        }

        return view('users.user_resources.edit')->with('userResource', $userResource);
    }


    /**
     * Remove the specified UserCertificate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userResource = UserResource::find($id);
        if(Auth::Check()){
            if (empty($userResource) && Auth::User()->id == $userResource->user_id){
                Flash::error(trans('users.userResourceNotFound'));
                return redirect(route('users-resources.index'));
            }
            elseif(!empty($userResource) && $userResource->status_id == 1 && Auth::User()->id == $userResource->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-resources.index'));
            }
            elseif(!empty($userResource) && $userResource->status_id == 0 && Auth::User()->id == $userResource->user_id){
                UserResource::destroy($id);
                Flash::error(trans('users.userResourceDeleted'));
                return redirect(route('users-resources.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-resources.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
