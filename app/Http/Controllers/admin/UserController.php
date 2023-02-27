<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use app\Models\User;


class UserController extends Controller
{
    public function index() {
        $user = User::get();
        return view('admin-view.user.index', compact('user'));
    }

    public function addUser() {
        $role = Role::get();
        return view('admin-view.user.add_user', compact('role'));
    }

    public function createUser(Request $request) {
        $request->validate([
            'name'    => 'required|unique:users,name',
            'role'    => 'required',
            'password'    => 'required|min:6',
        ]);
        $newUser = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        $newUser->assignRole($request->role);
        return redirect()->route('user-list')->with("success", "User added successfully!");
    }

    public function editUser($id){
        $user = User::where('id', base64_decode($id))->first();
        $role = Role::get();
        return view('admin-view.user.edit_user',compact('user', 'role'));
    }

    public function updateUser(Request $request) {
        $request->validate([
            'name'    => 'required',
            'role'    => 'required',
        ]);
        $edit_user = User::find($request->user_id);
        $edit_user->name = $request->name;
        $edit_user->save();

        $edit_user->syncRoles($request->role);
        return redirect()->route('user-list')->with("success", "User edited successfully!");
    }
}
