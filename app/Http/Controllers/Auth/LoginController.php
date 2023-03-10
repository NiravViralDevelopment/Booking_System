<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {  
        $inputVal = $request->all();
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required'    =>  'Email field is required',
            'password.required' =>  'Password field is required',
        ]);
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }else{
                
                return redirect()->route('home');
            }
        }else{
            // dd('hdy');
             return redirect()->back()
                ->with('error','Email & Password are incorrect.');
            // return redirect()->route('login')
            //     ->with('error','Email & Password are incorrect.');
        }     
    }

    
}
