<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;

class CheckUserType
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
        if(Auth::user()->userable instanceof Admin)
        {
            return $next($request);
        }

        return redirect('/');
    }
}
