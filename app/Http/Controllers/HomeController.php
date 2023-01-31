<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
class HomeController extends Controller
{
    
    public function __construct(request $request)
    {   
       
        
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            if(!empty($this->user)){
                return redirect()->route('resident.index');
                // return Response::view('front.Resident.index');
            }else{
                
                return Response::view('welcome');
            }
            return $next($request);
        });

    }
    
    public function index(){
        return view('front.Resident.index');
    }
    
      
}
