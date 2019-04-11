<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    public function index()
    {
        // $this->middleware('web');
        return view('layouts.back');
    }
}
