<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role == "admin") {
             return $next($request);
        }

        return redirect('home')->with('error','You have not admin access');
    }
}
