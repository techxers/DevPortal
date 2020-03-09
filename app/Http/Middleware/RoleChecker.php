<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_role=Auth::user()->role_id;
        if($user_role==1){
            return dd('superuser');
        }
        elseif($user_role==2){
            return dd('Admin');
        }
        elseif($user_role==3){
            return dd('client-security');
        }
        elseif($user_role==4){
            return dd('client-reception');
        }
        return $next($request);

    }
}
