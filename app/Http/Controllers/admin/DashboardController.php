<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{
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
