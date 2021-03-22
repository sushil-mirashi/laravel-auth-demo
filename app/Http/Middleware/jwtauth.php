<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Config;

class jwtauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Config::set('jwt.user', 'App\Models\AdminUsers'); 
        // Config::set('auth.providers.users.model', App\Models\AdminUsers::class);
        \Config::set('auth.model', 'App\Models\AdminUsers');
            \Config::set('auth.table', 'admin_users');
        return $next($request);
    }
}
