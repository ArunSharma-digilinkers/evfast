<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // 🔹 If not logged in → go to login page
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 🔹 Logged in but wrong role → 403
        if (strtolower(auth()->user()->role) !== strtolower($role)) {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
