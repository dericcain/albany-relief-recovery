<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsWorker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isWorker()) {
            return redirect(route('needs.create'));
        }

        return $next($request);
    }
}
