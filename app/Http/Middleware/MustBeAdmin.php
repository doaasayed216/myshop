<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class MustBeAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() or !in_array(auth()->user()->role_id, [Role::IS_ADMIN, Role::IS_SELLER])){
            abort(403);
        }
        return $next($request);
    }
}
