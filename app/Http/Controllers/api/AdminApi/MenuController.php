<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Company;
use Log;
use Validator;

class MenuController extends Controller
{
    public function index(){
        try{
            $menu = Menu::get();
            return response()->json(['message'=>'Menu List!','status'=>true,'data'=>$menu]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createMenu(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'company_id' => 'required',
                'branch_id' => 'required',
                'counter_id' => 'required',
                'menu_name' => 'required',
                'from_time' => 'required',
                'to_time' => 'required',
                'off_time' => 'required',
                'repeat_days' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $menu = new Menu();
            $menu->company_id = $request->company_id;
            $menu->branch_id = $request->branch_id;
            $menu->counter_id = $request->counter_id;
            $menu->menu_name = $request->menu_name;
            $menu->from_time = $request->from_time;
            $menu->to_time = $request->to_time;
            $menu->offtime = $request->off_time;
            $menu->repeat_days = implode(",", $request->repeat_days);
            
            $menu->save();

            DB::commit();

            return response()->json(['message'=>'Menu added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
        
    }

   
    public function updateMenu(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'company_id' => 'required',
                'branch_id' => 'required',
                'counter_id' => 'required',
                'menu_name' => 'required',
                'from_time' => 'required',
                'to_time' => 'required',
                'off_time' => 'required',
                'repeat_days' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $id = $request->menu_id;
            $menu = Menu::find($id);
            $menu->company_id = $request->company_id;
            $menu->branch_id = $request->branch_id;
            $menu->counter_id = $request->counter_id;
            $menu->menu_name = $request->menu_name;
            $menu->from_time = $request->from_time;
            $menu->to_time = $request->to_time;
            $menu->offtime = $request->off_time;
            $menu->repeat_days = implode(",", $request->repeat_days);
            $menu->save();
        
            DB::commit();

           return response()->json(['message'=>'Menu updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function menuStatus(Request $request)
    {
        try{
            DB::beginTransaction();

            $menu = Menu::find($request->menu_id);
            $menu->is_active = $request->status;
            $menu->save();

            DB::commit();

            return response()->json(['message'=>'Menu status changed successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getMenu($id){
        $menu = Menu::where('counter_id', $id)->get();
        return $menu;
    }
}
