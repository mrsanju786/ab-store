<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Location;
use Auth;
use Log;
use Validator;

class AreaController extends Controller
{
    public function index(){
        try{
            $area = Area::get();
            return response()->json(['message'=>'Area List!','status'=>true,'data'=>$area]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createArea(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'area_name' => 'required',
                'location_id' => 'required',
            ],[
                'area_name.required'=>'Area name is Required',
                'location_id.required'=>'location Id is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $area = new Area();
            $area->area_name = $request->area_name;
            $area->location_id = $request->location_id;
            $area->save();

           return response()->json(['message'=>'Area added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function updateArea(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'area_name' => 'required',
                'location_id' => 'required',
            ],[
                'area_name.required'=>'Area Name is Required',
                'location_id.required'=>'location Id is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $area = Area::find($request->area_id);
            $area->area_name = $request->area_name;
            $area->location_id = $request->location_id;
            $area->save();

            return response()->json(['message'=>'Area updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function areaStatus(Request $request)
    {
        try{
            $area = Area::find($request->area_id);
            $area->is_active = $request->status;
            $area->save();
            return response()->json(['message'=>'Area status changed successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
