<?php

namespace App\Http\Middleware;

use App\Category;
use App\Models\Follower;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        Gate::define('not-be-admin', function () {
            return !\Auth::guard('admin')->check();
        });

        Gate::define('see-it', function () {
            return \Auth::check();
        });

        return $next($request);
    }
}
