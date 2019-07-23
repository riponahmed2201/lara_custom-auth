<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Confirmemail;

class RegistationController extends Controller
{
    public function index()
    {
    	if (session()->get('auth')) {
    		return redirect()->route('dashboard');
    	}else{
    		return view('admin.register');
    	}
    	
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email',
    		'username' => 'required|unique:admins',
    		'phone' => 'required',
    		'password' => 'required',
    		'confirm_password' => 'required',
    	]);

    	if ($request->password == $request->confirm_password) {
    		$admin = new Admin();
    		$admin->name = $request->name;
    		$admin->email = $request->email;
    		$admin->username = $request->username;
    		$admin->phone = $request->phone;
    		$admin->password =$request->password;
    		$admin->save();
    		Notification::route('mail', $request->email)
            ->notify(new Confirmemail($admin));
    		return redirect()->route('admin_login')->with('status','please check your inbox');
    	}else{
    		return back()->with('status','Your confirm Password does not match');
    	}
    }

    public function confirm_email($id)
    {
        $user = Admin::find($id);
        $user->confirm_email = 0;
        $user->save();
        return redirect()->route('admin_login')->with('status','Now Please log In');
    }

    
}
