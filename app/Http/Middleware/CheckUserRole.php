<?php

namespace App\Http\Middleware;
use Spatie\Permission\Traits\HasRoles;

use Closure;
use Auth;
class CheckUserRole
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
        if (Auth::user() &&  Auth::user()->role == 1) {
            auth()->user()->assignRole('Admin');
        }
        else {
            auth()->user()->assignRole('Default');
        }
        return $next($request);
        
    }
}
