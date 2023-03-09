<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use app\Models\User;
use Log;
use Validator;

class UserController extends Controller
{
    public function index() {
        try{
          $user = User::get();
          return response()->json(['message'=>'User List!','status'=>true,'data'=>$user ]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addUser() {
        $role = Role::get();
        return view('admin-view.user.add_user', compact('role'));
    }

    public function createUser(Request $request) {
        try{
            $validator = Validator::make($request->all(), [
                'name'    => 'required|unique:users,name',
                'role'    => 'required',
                'password'    => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            $newUser = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
            $newUser->assignRole($request->role);
            return response()->json(['message'=>'User added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function editUser($id){
        $user = User::where('id', base64_decode($id))->first();
        $role = Role::get();
        return view('admin-view.user.edit_user',compact('user', 'role'));
    }

    public function updateUser(Request $request) {
        try{
            $request->validate([
                'name'    => 'required',
                'role'    => 'required',
            ]);
            $edit_user = User::find($request->user_id);
            $edit_user->name = $request->name;
            $edit_user->save();

            $edit_user->syncRoles($request->role);
            return response()->json(['message'=>'User updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
