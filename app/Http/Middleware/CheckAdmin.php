<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        \Log::debug($request->user()->isAdmin());
            if ($request->user() && !$request->user()->role_id)
            return redirect('/');

        return $next($request);
    }
}
