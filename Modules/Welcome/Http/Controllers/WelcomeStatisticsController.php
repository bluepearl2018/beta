<?php

namespace Modules\Welcome\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class WelcomeStatisticsController extends Controller
{
    
    private $countDomains;
    // TODO : générer des statistiques une fois que tout sera bien en place
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        return view('welcome::index');
    }

    public function publicStats(){
        $countUsers = count(User::all());
        $countDomains = count(DB::table('pools')->where('parent_id', '=', NULL)->get());
        // dd($countDomains);
        $countPools = count(DB::table('pools')->get()) - $this->countDomains;

        $countAdmins = count(DB::table('model_has_roles')->where('role_id', '1')->pluck('role_id'));
        $countSuperAdmin = count(DB::table('model_has_roles')->where('role_id', '2')->pluck('role_id'));
        $countManagers = count(DB::table('model_has_roles')->where('role_id', '3')->pluck('role_id'));
        $countVendors = count(DB::table('model_has_roles')->where('role_id', '7')->pluck('role_id'));
        $countBuyers = count(DB::table('model_has_roles')->where('role_id', '8')->pluck('role_id'));
        $countDTPers = count(DB::table('model_has_roles')->where('role_id', '9')->pluck('role_id'));
        $countDevelopers = count(DB::table('model_has_roles')->where('role_id', '16')->pluck('role_id'));

        return view('statistics.public-statistics')->with(compact(
            'countUsers', 
            'countDomains', 
            'countPools',
            'countAdmins',
            'countSuperadmin',
            'countManagers',
            'countVendors',
            'countBuyers',
            'countDTPers',
            'countDevelopers'

        ));
        
    }
}
