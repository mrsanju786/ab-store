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

        $user = User::where('id', 2)->first();

        $user->assignRole('User');
        // $adminRole = Role::create(['name' => 'Admin']);
        // $userRole = Role::create(['name' => 'User']);

        // $adminRole->givePermissionTo([
        //     'logout',
        //     'dashboard',
        // ]);

        // $userRole->givePermissionTo([
        //     'dashboard',
        // ]);
    }
}
