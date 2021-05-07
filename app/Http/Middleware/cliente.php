<?php

namespace App\Http\Middleware;

use Closure;

class cliente
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
        if(auth()->check() && $request->user()->tipo === "cliente") {
            return redirect()->guest('homdwd');
        }
        return $next($request);
    } 
}
