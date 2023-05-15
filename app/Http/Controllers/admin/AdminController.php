<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator,Redirect,Response;
use Session, Artisan;
use App\Models\User;
use App\Models\Subscribe;
use App\Models\ContactUs;

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

    public function conatctList(){

        $contact = ContactUs::orderBy('id','desc')->get();

        return view('admin-view.contact.index', compact('contact'));
    }

    public function conatctView($id){
        $record = ContactUs::where('id',base64_decode($id))->first();

        return view('admin-view.contact.view',compact('record'));
    }

    public function conatctActive($id){
        $record = ContactUs::where('id',base64_decode($id))->where('status',0)->update(['status'=>1]);
        return redirect()->route('contact/index')->with('success', 'User activated successfully!');
    }

    public function conatctInActive($id){
        $record = ContactUs::where('id',base64_decode($id))->where('status',1)->update(['status'=>0]);
        return redirect()->route('contact/index')->with('success', 'User deactivated successfully!');
    }

    public function subscribeList(){

        $subscribe = Subscribe::orderBy('id','desc')->get();

        return view('admin-view.subscribe.index', compact('subscribe'));
    }

    public function subscribeView($id){
        $record = Subscribe::where('id',base64_decode($id))->first();

        return view('admin-view.subscribe.view',compact('record'));
    }

    public function subscribeActive($id){
        $record = Subscribe::where('id',base64_decode($id))->where('status',0)->update(['status'=>1]);
        return redirect()->route('subscribe/index')->with('success', 'User activated successfully!');
    }

    public function subscribeInActive($id){
        $record = Subscribe::where('id',base64_decode($id))->where('status',1)->update(['status'=>0]);
        return redirect()->route('subscribe/index')->with('success', 'User deactivated successfully!');
    }
}
