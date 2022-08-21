<?php

namespace App\Http\Middleware;

use Closure;

class login
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
        if (!\Auth::guest())
        {
            return $next($request);
        }else{
            return redirect(route('user/login'))->with('error','Giriş yapman gerekiyor');
        }
        return redirect(route('user/login'));
    }
}
