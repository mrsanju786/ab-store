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
    public function user() {
        $users = User::get();
        return view('admin-view.user', compact('users'));
    }

    public function addUser() {
        $permissions = Permission::get();
        return view('admin-view.add_user', compact('permissions'));
    }

    public function createUser(Request $request) {
        $request->validate([
            'user_name'    => 'required|unique:users,name',
        ]);
        $newUser = User::create(['name' => $request->user_name]);
        $newUser->givePermissionTo($request->permission);
        return redirect()->back();
    }

    public function editUser($id){
        $user = User::where('id', base64_decode($id))->first();
        $permissions = $user->permissions->pluck('name');
        return view('admin-view.edit_user',compact('user', 'permissions'));
    }

    public function updateUser(Request $request, $id) {
        $request->validate([
            'user_name'    => 'required',
        ]);
        $edit_user = User::find(base64_decode($id));
        $edit_user->name = $request->user_name;
        $edit_user->save();

        $edit_user->syncPermissions($request->permission);
        return redirect()->back()->with("success", "User edited successfullu!");
    }
}
