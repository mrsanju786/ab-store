<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator,Redirect,Response;
use Session, Artisan;
use App\Models\User;
use App\Hepler\Helpers;

class LoginController extends Controller
{
    
    //login users
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all() ]);
        }
       
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user(); 
            $token = $user->createToken('Foodisoft')->accessToken;
           
            return response()->json(['message'=>'User Login Successfully!','status'=>'success','token'=>$token,'data'=>$user]);
           
        }
        return response()->json(['message'=>'Email and Password is worng!','status'=>'false']);
     
    }
    
    //user logout
    public function logout() {
        Session::flush();
        Auth::guard('web')->logout();
        return response()->json(['message'=>'User Logout successfully!','status'=>'false']);
    }
}
