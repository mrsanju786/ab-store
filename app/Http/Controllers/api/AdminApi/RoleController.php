<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use Storage;
use Auth;
use Redirect;
use Response;
use Validator;
use DB;
use Log;

class RoleController extends Controller
{
    public function role() {
        try{
            $roles = Role::orderBy('id','desc')->get();
            return response()->json(['message'=>'Role List!','status'=>true,'data'=>$roles]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    public function PermissionList() {
        try{
            $permissions = Permission::get();
            return response()->json(['message'=>'Permission List!','status'=>true,'data'=>$permissions]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    public function store(Request $request) {
        try{

            $validator = Validator::make($request->all(), [
                'role_name'    => 'required|unique:roles,name',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $newRole = Role::create(['name' => $request->role_name]);
            $newRole->givePermissionTo($request->permission);

            DB::commit();

            return response()->json(['message'=>'Role added successfully!','status'=>true,'data'=>[]]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    public function update(Request $request) {
        try{

            $validator = Validator::make($request->all(), [
                'role_name'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }


            DB::beginTransaction();
            
            $id = $request->role_id;
            $edit_role = Role::find($id);
            $edit_role->name = $request->role_name;
            $edit_role->save();

            $edit_role->syncPermissions($request->permission);

            DB::commit();

            return response()->json(['message'=>'Role updated successfully!','status'=>true,'data'=>[]]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
}
