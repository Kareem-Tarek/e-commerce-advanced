<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('dashboard_login');
    }

    public function index()
    {
        return view('layouts.dashboard.auth.login');        
    }

}
