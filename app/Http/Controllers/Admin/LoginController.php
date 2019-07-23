<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Forgotpassword;

class LoginController extends Controller
{
    public function index()
    {
    	if (session()->get('auth')) {
    		return redirect()->route('dashboard');
    	}else{
    		return view('admin.login');
    	}

    	 
    }

    public function check(Request $request)
    {
    	 $username = Admin::where('username',$request->username)->first();
    	 
    	 $password_check = Admin::where('password',$request->password)->first();
    	 if ($username != null) {
    	 	if ($username->password == $request->password) {
    	 		if ($username->confirm_email == 0) {
    	 			session()->put('auth',[
    	 				'name' => $username->name,
    	 				'email' => $username->email,
    	 				'password' => $username->password,
    	 				'id' => $username->id,
    	 			]);
    	 			return redirect()->route('dashboard');
    	 		}else{
    	 			return back()->with('status','please verify your email');
    	 		}
    	 	}else{
    	 		return back()->with('status','Your password does not exists');
    	 	}

    	 }else{
    	 	return back()->with('status','Your Username does not exists');
    	 }

	}

    public function forgot()
    {
        return view('admin.forgot');
    }

    public function forgot_check(Request $request)
    {
        $admin = Admin::where('email',$request->email)->first();
        if ($admin != null) {
            Notification::route('mail', $request->email)
            ->notify(new Forgotpassword($admin));
            return back()->with('status','please check your inbox');
        }else{
            return back()->with('status','Your Email does not exists');
        }
    }

    public function forgot_update($id)
    {

       $user = Admin::find($id);
       if ($user->status == 1) {
           $user->status = 0;
       }
       $user->save();

       return view('admin.forgot_password',compact('user'));
    }

    public function forgot_new(Request $request,$id)
    {
        $user = Admin::where('id',$id)->first();
        if ($user->status == 0) {
            if ($user->password == $request->old_password) {
               if ($request->password == $request->confirm_password) {
                   $user->password = $request->password;
                   $user->status = 1;
                   $user->save();
                   return redirect()->route('admin_login')->with('status','Your password suessfully changed');
               }
            }else{
                 return back()->with('status','Your Old password does not exists');
            }
        }else{
            return back();
        }
       
    }

    public function logout()
    {
        session()->forget('auth');
        return back();
    }
}
