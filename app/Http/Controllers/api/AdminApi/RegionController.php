<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Company;
use App\Models\Country;
use Auth;
use Log;
use Validator;

class RegionController extends Controller
{
    public function index(){
        try{
          $region = Region::get();
          return response()->json(['message'=>'City List!','status'=>true,'data'=>$region]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addRegion(){

        $country = Country::get();
        return view('admin-view.region.add_region', compact('country'));
    }

    public function createRegion(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'region_name' => 'required',
                'country_id' => 'required',
            ],[
                'region_name.required'=>'Region Name is Required',
                'country_id.required'=>'country Id is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            

            $license = new Region();
            $license->region_name = $request->region_name;
            $license->country_id = $request->country_id;
            $license->save();

            return response()->json(['message'=>'Region added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editRegion($id){

        $region = Region::find(base64_decode($id));
        $country = Country::get();
        return view('admin-view.region.edit_region', compact('region','country'));
    }

    public function updateRegion(Request $request){
        try{ 
            $validator = Validator::make($request->all(), [
                'region_name' => 'required',
                'country_id' => 'required',
            ],[
                'region_name.required'=>'Region Name is Required',
                'country_id.required'=>'country Id is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
        
            $license = Region::find($request->region_id);
            $license->region_name = $request->region_name;
            $license->country_id = $request->country_id;
            $license->save();

            return response()->json(['message'=>'Region updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function regionStatus(Request $request)
    {
        try{ 
            $size = Region::find($request->region_id);
            $size->is_active = $request->status;
            $size->save();
            return response()->json(['message'=>'Region status updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
