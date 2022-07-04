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
        //if logged in admin user tried admin login page
        if(\Route::currentRouteName() === 'admin_login' && Auth::guard('admin')->check()) {
            return redirect(route('admin.home'));
        }

        //if logged in user tried admin login page
        if (\Route::currentRouteName() === 'login' &&
            (Auth::guard('web')->check() || Auth::guard('admin')->check())) {
            return redirect('/');
        }

        return $next($request);
    }
}
