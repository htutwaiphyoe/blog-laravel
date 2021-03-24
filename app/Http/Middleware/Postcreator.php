<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Postcreator
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
        if(!Auth::check())
        {
            return redirect('user/login');
        }
        else
        {
            if(Auth::user()->hasRole(['Manager','Staff','Supervisor']))
                return $next($request);
            else
                return redirect('/');
        }

    }
}
