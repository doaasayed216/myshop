<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() or !auth()->user()->isAdmin){
            abort(403);
        }
        return $next($request);
    }
}
