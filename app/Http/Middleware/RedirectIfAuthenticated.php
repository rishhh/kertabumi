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
            case 'customer':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('customer.home');
                }
                break;
            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('backend.home');
                }
                break;
            case 'adminstok':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('adminstok.home');
                }
                break;
        }
        

        return $next($request);
    }
}
