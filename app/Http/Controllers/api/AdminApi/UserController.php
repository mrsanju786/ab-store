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
use App\Models\Company;
use App\Models\userHasCompany;

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
                'name'    => 'required|max:100',
                'role'    => 'required',
                'email'    => 'required|email|max:250|unique:users,email',
                'password'    => 'required|min:6',
                'company_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $newUser = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
            $userHasCompany = userHasCompany::create(['company_id' => $request->company_id, 'user_id'=>$newUser->id]);
            $newUser->assignRole($request->role);

            DB::commit();

            return response()->json(['message'=>'User added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
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
            $validator = Validator::make($request->all(), [
                'name'    => 'required|max:100',
                'role'    => 'required',
                'company_id' => 'required',
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();
            
            $edit_user = User::find($request->user_id);
            $edit_user->name = $request->name;
            $edit_user->save();

            $userCompany = userHasCompany::where('user_id', $request->user_id)->first();
            $userCompany->company_id = $request->company_id;
            $userCompany->save();
            $edit_user->syncRoles($request->role);

            DB::commit();


            return response()->json(['message'=>'User updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
