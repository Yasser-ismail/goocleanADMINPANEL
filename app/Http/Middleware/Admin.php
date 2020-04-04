<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class Admin
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

        if (auth()->user()->type != User::ADMIN_TYPE || auth()->user()->type != User::SUPERVISOR_TYPE) {
            abort(403, trans('auth.permission'));
        }

        return $next($request);
    }
}
