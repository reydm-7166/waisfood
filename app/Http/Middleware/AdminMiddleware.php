<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::user()->role_as != 1 || Auth::user()->role_as == null) {
        //     return redirect('/');
        // }
        if (!Auth::check() || !Auth()->user()->role_as) {
            abort('403');
        }

        return $next($request);
    }
}
