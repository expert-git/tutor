<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsTutor
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
                //dd(Auth::user()->role_id);
            if(Auth::user()->role_id == 3){
                return $next($request);

            }else{
                return redirect()->route('unauthorized');        
            }
        }else{
            return redirect()->route('dashboard_index');
        }
    }
}
