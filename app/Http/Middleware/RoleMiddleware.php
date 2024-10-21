<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if ($user && $user->hasAnyRole($roles)) {
            return $next($request);
        }
        
        return redirect('/home')->with('error', 'You do not have access to this resource.');
    }
}
