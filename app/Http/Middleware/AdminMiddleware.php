<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $user = Admin::where('email',session()->get('auth')['email'])->first();
        if ($user != null) {
            return $next($request);
        }else{
            return redirect()->route('admin_login');
        }
        
    }
}
