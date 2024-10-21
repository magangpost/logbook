<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PelangganMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role == "pelanggan") {
             return $next($request);
        }

        return redirect('home')->with('error','You have not pelanggan access');
    }
}
