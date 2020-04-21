<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminProfile
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
        $adminUsername = $request->route('admin');
        if($adminUsername->username == Auth::user('admin')->username){
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
