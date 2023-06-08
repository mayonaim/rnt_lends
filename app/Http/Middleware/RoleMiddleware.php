<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        foreach ($roles as $role) {
            if ($user->role === $role) {
                return $next($request);
            }
        }

        return back()->withErrors('Unauthorized Access');
    }
}
