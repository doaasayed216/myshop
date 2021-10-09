<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = [
            'admin' => 1,
            'seller' => 2,
            'customer' => 3
        ];

        if(auth()->user()->role_id !== $roles[$role]) {
            abort(403);
        }

        return $next($request);
    }
}
