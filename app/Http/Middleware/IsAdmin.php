<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
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
        if(Auth::check()){

            if(Auth::user()->role_id != 5){
                return $next($request);
            }else{
                return redirect()->route('unauthorized');
            }
        }else{
            return redirect()->route('adminlogin_index');
        }
    }
}
