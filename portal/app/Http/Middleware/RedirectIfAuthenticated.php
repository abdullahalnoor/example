<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
       
        switch ($guard) {
        case 'practice':
            $link = '/practice/practice-home';
            break;
        case 'admin':
            $link = '/admin/home';
            break;    
        
        default:
            $link = '/home';
            break;
        }

        if (Auth::guard($guard)->check()) {
            return redirect($link);
        }

        return $next($request);
    }
}
