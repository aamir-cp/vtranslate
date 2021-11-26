<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVerified
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
        if(Auth::check())
        {
                    if(Auth::user()->email_verified_at == NULL)
                    { 
                      return redirect()->route('verification.notice');
                    }
                    else{

                        return $next($request);
                    }
                }
        }
        else
        {
            return $next($request);
        }
    }
}
