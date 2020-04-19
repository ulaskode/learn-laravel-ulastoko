<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        // Cek apakah dia admin atau bukan
        if(auth()->guard('admin')->check()){
            // Jika admin
            return $next($request);
        }else{
            // Jika bukan
            return redirect(route('login'));
        }
    }
}
