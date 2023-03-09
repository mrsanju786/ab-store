<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use App\Models\User;
use App\Models\Company;
use App\Models\userHasCompany;


class UserController extends Controller
{
    public function index() {
        $user = User::get();
        return view('admin-view.user.index', compact('user'));
    }

    public function addUser() {
        $role = Role::get();
        $company = Company::get();
        return view('admin-view.user.add_user', compact('role','company'));
    }

    public function createUser(Request $request) {
        $request->validate([
            'name'    => 'required|unique:users,name',
            'role'    => 'required',
            'password'    => 'required|min:6',
            'company_id' => 'required',
        ]);
        $newUser = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);

        $userHasCompany = userHasCompany::create(['company_id' => $request->company_id, 'user_id'=>$newUser->id]);

        $newUser->assignRole($request->role);
        return redirect()->route('user-list')->with("success", "User added successfully!");
    }

    public function editUser($id){
        $user = User::where('id', base64_decode($id))->first();
        $role = Role::get();
        $company = Company::get();
        $userHasCompany = userHasCompany::where('user_id', $user->id)->first();
        $company_id = $userHasCompany->company_id;
        return view('admin-view.user.edit_user',compact('user', 'role','company','company_id'));
    }

    public function updateUser(Request $request) {
        $request->validate([
            'name'    => 'required',
            'role'    => 'required',
            'company_id' => 'required',
        ]);
        $edit_user = User::find($request->user_id);
        $edit_user->name = $request->name;
        $edit_user->save();

        $userCompany = userHasCompany::where('user_id', $request->user_id)->first();
        $userCompany->company_id = $request->company_id;
        $userCompany->save();

        $edit_user->syncRoles($request->role);
        return redirect()->route('user-list')->with("success", "User edited successfully!");
    }
}
