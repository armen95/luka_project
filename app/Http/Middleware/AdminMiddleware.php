<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if( auth()->check() && auth()->user()->isAdmin()) {

            // return redirect('/admin/profile');
            return $next($request);
        }
        return redirect('/user/profile');
    }
}
