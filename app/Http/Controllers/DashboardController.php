<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
        return view('dashboard.index');
    }

    public function features(){
        return view('features.index');
    }
}
