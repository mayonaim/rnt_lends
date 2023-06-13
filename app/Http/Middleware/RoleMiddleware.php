<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $user = Auth::user();

            foreach ($roles as $role) {
                if ($user->role === $role) {
                    return $next($request);
                }
            }
        }

        return Redirect::route('home');
    }
}
