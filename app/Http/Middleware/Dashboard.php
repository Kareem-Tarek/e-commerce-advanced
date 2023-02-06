<?php

namespace App\Http\Middleware;

use Closure;

class Dashboard
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
        if (auth()->guest() && Auth::guest() && !auth()->user()){ // all three conditions means the same thing which is if user is "guest"
            return redirect('/register');
        }

        if (auth()->user()->user_type != "admin" && 
            auth()->user()->user_type != "moderator" && 
            auth()->user()->user_type != "supplier"){ // it means that if user type is not admin, moderator & supplier which is equals to "customer"
            return redirect('/');
        }

        return $next($request);
    }
}