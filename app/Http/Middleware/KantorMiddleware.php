<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KantorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role == "kantor") {
             return $next($request);
        }

        return redirect('home')->with('error','You have not kantor access');
    }
}
