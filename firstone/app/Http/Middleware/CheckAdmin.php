<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        $whatRole = Auth::user()->profile()->pluck('role');
        if (!$whatRole->contains('1')){
        return redirect('/home');
        }

        return $next($request);
    }
}
