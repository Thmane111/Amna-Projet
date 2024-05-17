<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetSessionCookieName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $guardName = $this->getActiveGuard($request);

        $cookieName = Str::slug(config('app.name', 'laravel') . '_' . $guardName, '_') . '_session';

        config(['session.cookie' => $cookieName]);

        return $next($request);
    }

    protected function getActiveGuard($request)
    {
        // List all your guards here
        $guards = ['web', 'admin'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard; // Return the name of the guard that's active
            }
        }

        return 'web'; // Default to 'web' if no specific guard is authenticated
    }


}
