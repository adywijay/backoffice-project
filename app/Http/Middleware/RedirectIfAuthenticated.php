<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        if (Auth::check() && Auth::user()->role == 'super_admin') {
            //return '/super-admin';
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'admin') {
            //return '/admin';
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'employe') {
            //return '/employee';
            return $next($request);
        }
        return $next($request);

        /*
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // dd(Auth::user()->role);
                // return redirect(RouteServiceProvider::HOME);
                //dd(Auth::guard($guard)->check());
                if (auth()->user()->role == 'admin') {
                    return '/admin';
                } elseif (auth()->user()->role == 'super_admin') {
                    return '/super-admin';
                } elseif (auth()->user()->role == 'employe') {
                    return '/employee';
                }
            }
        }
        */
    }
}
