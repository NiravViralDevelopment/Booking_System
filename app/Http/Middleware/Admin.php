<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Response;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
       
        if (Auth::check()){
            if(auth()->user()->is_admin == 1){
                
                // return $next($request);
            }
        }  
        return $next($request);     
        // return redirect('home')->with('error',"Only admin can access!");
    }
}
