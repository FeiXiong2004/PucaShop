<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActiveStatus
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
        if (Auth::check()) {
         
            if (Auth::check() && Auth::user()->active === 0) {
                Auth::logout();
                return redirect()->route('account')->with('error', 'Your account has been banned');
            }
        }
        
        return $next($request);
        

      
    }
}
