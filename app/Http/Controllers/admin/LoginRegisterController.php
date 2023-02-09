<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator,Redirect,Response;
use Session, Artisan;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function register(){

        return view('admin-view/user_register');
    }

    public function saveRegister(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        if($user){
            return Redirect::to("admin/login")->with('message', 'Successfully Registered...!');
        }else{
            return Redirect::to("admin/register")->with('message', 'Some went wrong...!');
        }
        

    }

    public function login()
    {
        Artisan::call("permission:create-permission-routes");
        return view('admin-view/user_login');
    }

    public function createLogin(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            return redirect()->intended('admin/dashboard');
        }
        return Redirect::to("admin/login")->with('message', 'Invalid Login...!');

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login');
    }
}
