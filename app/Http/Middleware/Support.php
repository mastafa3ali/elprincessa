<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Support
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guest())
        {
            if(auth()->user()->type=='admin'||auth()->user()->type=='support'){
                return $next($request);
            }
        }
        return redirect()->route('/');
    }
}
