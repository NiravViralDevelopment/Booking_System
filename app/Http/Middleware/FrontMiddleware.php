<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Response;
use Illuminate\Http\Request;

class FrontMiddleware
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
        
        

        // if(Auth::check() == true){
        // }else{
        //     return Response::view('welcome');
        // } 
        
        return $next($request);
    }
}
