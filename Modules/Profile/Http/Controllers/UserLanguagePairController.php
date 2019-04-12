<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Controller as BaseController;
use Modules\Profile\Http\Requests\UserLanguagePairRequest as StoreRequest;
use Modules\Profile\Repositories\UserLanguagePairRepository;
use Modules\Profile\Repositories\UserRepository;

use Auth;
use Crypt;
use Validator;
use DB;
use Flash;
use Session;

class UserLanguagePairController extends BaseController
{
    /** @var  UserLanguagePairRepository */
    private $userLanguagePairRepository;
    private $userRepository;

    public function __construct(UserLanguagePairRepository $userLanguagePairRepo, UserRepository $userRepo)
    {
        $this->userLanguagePairRepository = $userLanguagePairRepo;
        $this->userRepository = $userRepo;
        $this->middleware(['role:translator', 'permission:access-language-pairs']);
    }

    /**
     * Display a listing of the UserLanguagePair.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        $userLanguagePairs = $this->userLanguagePairRepository->getLanguagePairsForCurrentUser($currentUser);
            return view('profile::userLanguagePairs.index')
            ->with($userLanguagePairs);
    }

    /**
     * Show the form for creating a new UserLanguagePair.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::User()->id;
        $maxLangPairForUser = $this->userRepository->maxLangPairForUser($currentUser);
        $currentUserLangPairCount = $this->userLanguagePairRepository->countLanguagePairsForCurrentUser($currentUser);
        $remainingLanguagePairs = $maxLangPairForUser-$currentUserLangPairCount;
        if($currentUserLangPairCount == $maxLangPairForUser){
            Flash::error(trans('action.creationLimitReached'));
            return view('profile::index');
        }
        elseif($currentUserLangPairCount < $maxLangPairForUser){
            Flash::success(trans('profile.remainingLanguagePairs'.'&nbsp;:'. $remainingLanguagePairs));
            return view('profile::userLanguagePairs.create');
        }
        return view('profile::index');
    }


    /**
     * Store a newly created UserLanguagePair in storage.
     *
     * @param CreateUserLanguagePairRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $currentUser = \Auth::User()->id;
        $currentUser = Auth::User()->id;
        $maxLangPairForUser = $this->userRepository->maxLangPairForUser($currentUser);
        $currentUserLangPairCount = $this->userLanguagePairRepository->countLanguagePairsForCurrentUser($currentUser);
        $remainingLanguagePairs = $maxLangPairForUser-$currentUserLangPairCount;
        if($currentUserLangPairCount == $maxLangPairForUser){
            Flash::error(trans('action.creationLimitReached'));
            return view('profile::index');
        }
        elseif($currentUserLangPairCount < $maxLangPairForUser){
            
            $checkPair = \Modules\Profile\Entities\UserLanguagePair::where('user_id', $currentUser)
            ->where('sourceLang_id', $validated['sourceLang_id'])
            ->where('targetLang_id', $validated['targetLang_id'])
            ->first();

            // dd($checkPool);
            if(!empty($checkPair)){
                Flash::error(trans('users.userLanguagPairAlreadyRegistered'));
                return view('profile::index');
            }
            $user = ['user_id' => $currentUser];
            $validated_array = array_merge($validated, $user);
            // dd($validated_array);
            \Modules\Profile\Entities\UserLanguagePair::create($validated_array);
            Flash::success(trans('users.userLanguagPairAdded'));
            return redirect('/profile/users-language-pairs');
        }
    }

    public function toggleVisibility(Request $request)
    {
        $languagePairId = Crypt::decrypt($request['language_pair_id']);
        $row2update = \Modules\Profile\Entities\UserLanguagePair::find($languagePairId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userLanguagPairNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('/profile');
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect('/profile');
            }
            return redirect('//profile');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $languagePairId = Crypt::decrypt($request->language_pair_id);
        $row2update =\Modules\Profile\Entities\UserLanguagePair::find($languagePairId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userLanguagPairNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('/profile');
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash::warning(trans('action.itemNowInvisible'));;
                return redirect('/profile');
            }
            return redirect('//profile');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }


    /**
     * Remove the specified UserLanguagePair from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userLanguagePair = \Modules\Profile\Entities\UserLanguagePair::find($id);
        if(Auth::Check()){
            if (empty($userLanguagePair) && Auth::User()->id == $userLanguagePair->user_id){
                Flash::error(trans('users.userLanguagPairNotFound'));
                return redirect(route('users-language-pairs.index'));
            }
            elseif(!empty($userLanguagePair) && $userLanguagePair->status_id == 1 && Auth::User()->id == $userLanguagePair->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-language-pairs.index'));
            }
            elseif(!empty($userLanguagePair) && $userLanguagePair->status_id == 0 && Auth::User()->id == $userLanguagePair->user_id){
                $userLanguagePair->delete();
                Flash::success(trans('users.userLanguagePairDeleted'));
                return redirect(route('users-language-pairs.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-language-pairs.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
