<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form(){
       
        return view('auth.login');
    }

    public function handleAdmin(){
        return view('admin.admin_dashboard');
    }

}
