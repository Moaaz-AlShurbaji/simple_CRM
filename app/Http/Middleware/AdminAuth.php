<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminAuth
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
        $isAuthenticatedAdmin = (Auth::check() && Auth::user()->is_admin == 1);
        if (! $isAuthenticatedAdmin)
        {
            return redirect('/login')->with('message', 'Authentication Error.');
        }
		
        return $next($request);
    }
}
