<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;

class RoleController extends Controller
{
    public function role() {
        $roles = Role::get();
        return view('admin-view.role', compact('roles'));
    }

    public function addRole() {
        $permissions = Permission::get();
        return view('admin-view.add_role', compact('permissions'));
    }

    public function createRole(Request $request) {
        $request->validate([
            'role_name'    => 'required|unique:roles,name',
        ]);
        $newRole = Role::create(['name' => $request->role_name]);
        $newRole->givePermissionTo($request->permission);
        return redirect()->back();
    }

    public function editRole($id){
        $role = Role::where('id', base64_decode($id))->first();
        $permissions = $role->permissions->pluck('name');
        return view('admin-view.edit_role',compact('role', 'permissions'));
    }

    public function updateRole(Request $request, $id) {
        $request->validate([
            'role_name'    => 'required',
        ]);
        $edit_role = Role::find(base64_decode($id));
        $edit_role->name = $request->role_name;
        $edit_role->save();

        $edit_role->syncPermissions($request->permission);
        return redirect()->back()->with("success", "Role edited successfullu!");
    }
}
