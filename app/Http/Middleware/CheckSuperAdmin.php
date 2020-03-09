<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_role = Auth::user();

        if (Auth::user() != null)
            if ($user_role->role_id > 1) {
                return abort(403, 'Unauthorized action.');
            }
        return $next($request);
    }
}
