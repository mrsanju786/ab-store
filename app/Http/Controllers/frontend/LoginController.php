<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator,Redirect,Response;
use Session, Artisan;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend/login');
    }

    public function createLogin(Request $request)
    {
        request()->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            if($user->is_admin==3){
                return redirect()->intended('/home')->with('message', 'Login successfully!');
            }
        }
        return Redirect::to("/login")->with('message', 'Email or Password is wrong!');

    }


    public function register(){
       
        return view('frontend.register');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'first_name'   => 'required|max:100',
            'last_name'    => 'required|max:100',
            'email'        => 'required|email|max:100',
            'phone'        => 'required|numeric',
            'password'     => 'required|min:6',
          
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->is_admin = 3;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with("success", "User registered successfully!");
    }


    public function profile(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('frontend.profile',compact($user));
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }

    
    public function updatePassword(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        $user = User::where('id',base64_decode($id))->where('is_admin',3)->first();
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect()->back()->with("success", "Password changed successfully!");
       
    }

    public function updateProfile(Request $request,$id)
    {
        $request->validate([
            'first_name'   => 'required|max:100',
            'last_name'    => 'required|max:100',
            'email'        => 'required|email|max:100',
            'phone'        => 'required|numeric',
        ]);

        $user = User::where('id',base64_decode($id))->where('is_admin',3)->first();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->save();
        return redirect()->back()->with("success", "Profile updated successfully!");
       
    }
}
