<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class DashboardController extends Controller
{
	public function dashboard()
    {
    	return view('dashboard');
    }
}
