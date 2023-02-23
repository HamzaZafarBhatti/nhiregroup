<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (in_array('admin', explode('/', $_SERVER['REDIRECT_URL']))) {
            return route('admin.login');
        }
        return route('user.login');
    }
}
