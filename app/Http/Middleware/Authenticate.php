<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if (0 === strncasecmp($request->path(), 'admin/', strlen('admin/'))) {
                return route('admin.index');
            } else {
                return route('front.index');
            }
        }
    }
