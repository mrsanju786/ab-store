<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    public function index() {
        $user = User::where('is_admin',3)->orderBy('id','desc')->get();
        return view('admin-view.staff.index', compact('user'));
    }

    public function create() {
        return view('admin-view.staff.create');
    }

    public function store(Request $request) {
        $request->validate([
            'first_name'   => 'required|max:100',
            'last_name'    => 'required|max:100',
            'email'        => 'required|email|unique:users,email|max:100',
            'phone'        => 'required',
            'password'     => 'required|min:6',
        ]);
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->is_admin = 3;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('staff/index')->with("success", "Staff added successfully!");
    }

    public function edit($id){
        $user = User::where('id', base64_decode($id))->first();
        return view('admin-view.staff.edit',compact('user'));
    }

    public function update(Request $request,$id) {
        // $request->validate([
        //     'first_name'   => 'required|max:100',
        //     'last_name'    => 'required|max:100',
        //     'email'        => 'required|email|max:100',
        //     'phone'        => 'required',
        //     'password'    => 'required|min:6',
        // ]);
        $edit_user = User::find(base64_decode($id));
        $edit_user->first_name = $request->first_name;
        $edit_user->last_name = $request->last_name;
        $edit_user->email = $request->email;
        $edit_user->phone = $request->phone;
        $edit_user->save();

        return redirect()->route('staff/index')->with("success", "Staff updated successfully!");
    }

    public function delete($id){
        $record = User::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('staff/index')->with('success', 'Staff deleted successfully!');
    
    }

    public function view($id){
        $record = User::where('id',base64_decode($id))->first();

        return view('admin-view.staff.view',compact('record'));
    }
}
