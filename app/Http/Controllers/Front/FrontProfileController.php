<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class FrontProfileController extends Controller
{
    public function index(){
        return view('front.FrontProfile.index');
    }
    
    public function create(){
        //
    }
    
    public function store(Request $request){
        
        $user = User::find(Auth::id());
        if(Hash::check($request->old_password, $user->password)) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|same:confirm_password',
            ],[
                'old_password'      => 'Old Password is required',
                'new_password'      => 'New password field is required',
                'new_password.same' => 'Password Confirmation should match the Password',
            ]);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success','Password changed successfully!');
        }else{
            $request->validate([
                'new_password' => 'required',
            ],[
                'new_password'      => "Old Password Doesn't match!",
            ]);

            return back()->with("new_password", "Old Password Doesn't match!");
        }

    }

    public function reset_form(){
        return view('reset_form');
    }

    public function reset_login(request $request){
        
        $request->validate([
            'email' => 'required',
            'confirm_password' => 'required',
            'new_password' => 'required|same:confirm_password',
        ],[
            'email.required'      => 'email field is required',
            'new_password.required'=> 'New password field is required',
            'confirm_password.required'=> 'Confirm password field is required',
            'new_password.same' => 'Password Confirmation should match the Password',
        ]);
        
        

        $data = User::where('email',$request->email)->where('is_admin',0)->first();
        
        if(Hash::check($request->new_password, $data->password)) {
            $data->password = Hash::make($request->new_password);
            $data->save();
            return redirect()->back()->with('success','Password changed successfully!');
        }else{
            return back()->with("new_password", "Old Password Doesn't match!");
        }

    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
