<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserSocialMediaRequest as StoreRequest;
use Modules\Profile\Http\Requests\UserSocialMediaRequest as UpdateRequest;

use App\Events\Users\SocialMediaCreated;

use Modules\Profile\Repositories\UserSocialmediaRepository;
use Modules\Profile\Repositories\UserRepository;

use Modules\UiTables\Repositories\SocialmediaRepository;
use App\Http\Controllers\Controller;
use Modules\Profile\Entities\UserSocialmedia;
use Illuminate\Http\Request;
use Flash;
use DB;
use Crypt;
use Auth;
use Mail;
use Response;

class UserSocialMediaController extends Controller
{
    /** @var  UserSocialmediaRepository */
    private $userSocialmediaRepository;
    /** @var  SocialmediaRepository */
    private $socialmediaRepository;
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(
        UserSocialmediaRepository $userSocialmediaRepo,
        SocialmediaRepository $socialmediaRepo,
        UserRepository $userRepo)
    {
        $this->userSocialmediaRepository = $userSocialmediaRepo;
        $this->socialmediaRepository = $socialmediaRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User Social Medias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        $userSocialmedias = $this->userSocialmediaRepository->getSocialmediasForCurrentUser($currentUser);
        // dd('dzdzd');
        return view('profile::userSocialmedias.index')
            ->with($userSocialmedias);
    }

    /**
     * Show the form for creating a new UserSocialmedia.
     *
     * @return Response
     */
    public function create()
    {
        $user_id = Auth::User()->id;
        $countForUser = $this->userSocialmediaRepository->countSocialMediasForCurrentUser($user_id);
        $countSocialMedias = $this->socialmediaRepository->countSocialMedias();
        $check = $countForUser < $countSocialMedias;
        
        if($check == TRUE)
        {
            return view('profile::userSocialmedias.create');
        }
        Flash::error(trans('action.creationLimitReached'));
        return redirect('/profile/users-social-medias');
        
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $currentUser = \Auth::User()->id;
            $checkSocialMedia = \Modules\Profile\Entities\UserSocialmedia::where('user_id', $currentUser)
            ->where('socialmedia_id', $validated['socialmedia_id'])
            ->first();

            // dd($checkTool);
            if($checkSocialMedia){
                Flash::error(trans('users.userSocialMediaAlreadyRegisterd'));
                return view('profile::userSocialmedias.create');
            }
            elseif(!$checkSocialMedia)
            {   
                $user = ['user_id' => $currentUser];
                $validated_array = array_merge($validated, $user);
                // dd($validated_array);
                $canSave = $this->userSocialmediaRepository->checkSocialMediasForCurrentUser($validated_array['user_id'], $validated_array['socialmedia_id']);
                if($canSave == TRUE)
                {
                    \Modules\Profile\Entities\UserSocialmedia::create($validated_array);
                    Flash::success(trans('users.userSocialMediaAdded'));
                    return redirect('/profile/users-social-medias');
                }
                elseif($canSave == FALSE)
                {
                    Flash::error(trans('interface.operationNotAuthorized'));
                    return redirect('/profile/users-social-medias');
                }
            }
    }

    public function toggleVisibility(Request $request)
    {
        $socialmedia_Id = Crypt::decrypt($request['socialmedia_id']);
        $row2update = \Modules\Profile\Entities\UserSocialmedia::find($socialmedia_Id);
        
        // dd(event(new SocialMediaCreated($row2update)));
        
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userSocialMediaNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('/profile/users-social-medias');
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect('/profile/users-social-medias');
            }
            return redirect('/zones/workspace');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $socialmedia_Id = Crypt::decrypt($request['socialmedia_id']);
        $row2update = UserSocialMedia::find($socialmedia_Id);
        
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userSocialMediaNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowActive'));
                return redirect('/profile/users-social-medias');
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInactive'));
                return redirect('/profile/users-social-medias');
            }
            return redirect('/profile');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function destroy($id)
    {
        
        $userSocialmedia = \Modules\Profile\Entities\UserSocialmedia::find($id);

        if (empty($userSocialmedia)) {
            Flash::error(trans('users.userSocialMediaNotFound'));
            return redirect(route('users-social-medias.index'));
        }

        \Modules\Profile\Entities\UserSocialmedia::destroy($id);
        Flash::success(trans('users.userSocialMediaDeleted'));
        return redirect(route('users-social-medias.index'));
        
    }
}
