<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;

class AuthenticateAdmin extends Middleware
{
    /**
     * @inheritdoc
     */
    public function __construct(Auth $auth)
    {
        parent::__construct($auth);
        $auth->shouldUse('admin');
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(\Route::currentRouteName() === 'admin.home')
                return route('admin_login');

            if($this->auth->guard('web')->check())
                return route('404');

            return route('login');
        }
    }
}
