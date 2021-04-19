<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {


        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->hasRole('User'))
                    return  redirect()->route('home.index');
                else if (Auth::user()->hasRole('Admin'))
                    return  redirect()->route('admin.dashboard');
                else if (Auth::user()->hasRole('Author'))
                    return  redirect()->route('author.dashboard');
            }
        }

        return $next($request);
    }
}
