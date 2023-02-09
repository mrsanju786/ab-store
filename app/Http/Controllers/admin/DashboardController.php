<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\BusinessSetting;

class DashboardController extends Controller
{
    public function dashboard(Request $request){

        $restaurant_name = BusinessSetting::where('key', 'restaurant_name')->first();
        
        return view('admin-view.dashboard', compact('restaurant_name'));
    }

    public function test(){


        // $adminRole = Role::create(['name' => 'Admin']);
        // $userRole = Role::create(['name' => 'User']);

        $adminRole = Role::where('name', 'Admin')->first();

        $adminRole->givePermissionTo([
            'register',
            'save-register',
            'login',
            'create-login',
            'logout',
            'dashboard',
            'role',
            'add-role',
            'create-role',
            'edit-role',
            'update-role',
            'user',
            'add-user',
            'create-user',
            'edit-user',
            'update-user',
        ]);

        // $userRole->givePermissionTo([
        //     'dashboard',
        // ]);

        // $user = User::where('id', 1)->first();

        // $user->assignRole('Admin');
    }
}
