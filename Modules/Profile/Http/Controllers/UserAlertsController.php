<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Controller as BaseController;
use Flash;
use Auth;
class UserAlertsController extends BaseController
{
    /**
     * Display & Manage User Profile.
     *
     * @return void
     */
/**
     * Returen welcome page for User Management profile
     *
     * @return void
     */

    public function index(Request $request)
    {	
        return view('users.user_alerts.user_alerts');
    }
}