<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfUserIsAssistant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($request->user()->role != 'assistant') {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}
