<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard.index');
    }

    public function admin(){
        return view('backend.dashboard.admin');
    }
}
