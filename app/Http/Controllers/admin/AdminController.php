<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator,Redirect,Response;
use Session, Artisan;
use App\Models\User;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin-view/login');
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
            if($user->is_admin==1){
                return redirect()->intended('admin/dashboard');
            }elseif($user->is_admin==3){
                return redirect()->intended('admin/dashboard');
            }
           
        }
        return Redirect::to("admin/login")->with('message', 'Email or Password is wrong!');

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login');
    }


    public function edit($id){
        $user = User::where('id', base64_decode($id))->first();
        return view('admin-view.admin.profile',compact('user'));
    }

    public function update(Request $request,$id) {
        $request->validate([
            'first_name'   => 'required|max:100',
            'last_name'    => 'required|max:100',
            'email'        => 'required|email|max:100',
            'phone'        => 'required',
          
        ]);
        $edit_user = User::find(base64_decode($id));
        $edit_user->first_name = $request->first_name;
        $edit_user->last_name = $request->last_name;
        $edit_user->email = $request->email;
        $edit_user->phone = $request->phone;
        $edit_user->save();

        return redirect()->back()->with("success", "Profile updated successfully!");
    }


    public function changePassword($id){
        $user = User::where('id', base64_decode($id))->first();
        return view('admin-view.admin.change_password',compact('user'));
    }

    public function updatePassword(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        $admin = User::where('id',base64_decode($id))->where('is_admin',1)->first();
        $admin->password = bcrypt($request['password']);
        $admin->save();
        return redirect()->back()->with("success", "Password updated successfully!");
       
    }
}
