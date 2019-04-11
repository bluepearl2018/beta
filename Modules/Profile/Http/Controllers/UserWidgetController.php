<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\UserWidgetRequest;
use Modules\Profile\Repositories\UserWidgetRepository;
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

use Modules\Profile\Http\Requests\UserWidgetRequest as StoreRequest;
use Modules\Profile\Http\Requests\UserWidgetRequest as UpdateRequest;

class UserWidgetController extends Controller
{
    /** @var  UserWidgetRepository */
    private $userWidgetRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserWidgetRepository $userWidgetRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userWidgetRepository = $userWidgetRepo;
    }

    /**
     * Display a listing of the UserWidget.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        $userWidgets = $this->userWidgetRepository->getWidgetsForCurrentUser($currentUser);

        return view('userWidgets.index')
            ->with($userWidgets);
    }

    /**
     * Show the form for creating a new UserTool.
     *
     * @return Response
     */
    public function create(UserWidgetRequest $request)
    {
        abort('500');
        $currentUser = Auth::User()->id;
        
    }

}
