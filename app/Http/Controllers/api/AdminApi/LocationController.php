<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\State;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Company;
use App\Models\Discount;
use Auth;
use Carbon\Carbon;
use Log;
use Validator;

class LocationController extends Controller
{
    public function index(){
        try{
          $location = Location::get();
       
          return response()->json(['message'=>'Location List!','status'=>true,'data'=>$location]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createLocation(Request $request){

        try{
            $validator = Validator::make($request->all(), [
                'location_address' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'pincode' => 'required',
                'vip_percent' => 'required',
                'vvip_percent' => 'required',
                'license_name' => 'required',
                'license_format' => 'required',
                'branch_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $location = new Location();
            $location->address = $request->location_address;
            $location->state_id = $request->state_id;
            $location->city_id = $request->city_id;
            $location->pincode = $request->pincode;
            $location->edited_at = Carbon::now();
            $location->edited_by = Auth::user()->id;
            $location->vip_percent = $request->vip_percent;
            $location->vvip_percent = $request->vvip_percent;
            $location->license_name = $request->license_name;
            $location->license_format = $request->license_format;
            $location->branch_id = $request->branch_id;
            $branch_detail = Branch::find($request->branch_id);
            $company = Company::find($branch_detail->company_id);
            $location->country_id = $company->country_id;
            $location->discount_ids = $request->discount_id;
            $location->save();

            return response()->json(['message'=>'Location added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function updateLocation(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'location_address' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'pincode' => 'required',
                'vip_percent' => 'required',
                'vvip_percent' => 'required',
                'license_name' => 'required',
                'license_format' => 'required',
                'branch_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
           
            $location_id = $request->location_id;
            $location = Location::find($location_id);
            $location->address = $request->location_address;
            $location->state_id = $request->state_id;
            $location->city_id = $request->city_id;
            $location->pincode = $request->pincode;
            $location->edited_at = Carbon::now();
            $location->edited_by = Auth::user()->id;
            $location->vip_percent = $request->vip_percent;
            $location->vvip_percent = $request->vvip_percent;
            $location->license_name = $request->license_name;
            $location->license_format = $request->license_format;
            $location->branch_id = $request->branch_id;
            $branch_detail = Branch::find($request->branch_id);
            $company = Company::find($branch_detail->company_id);
            $location->country_id = $company->country_id;
            $location->discount_ids = $request->discount_id;
            $location->save();

            return response()->json(['message'=>'Location updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function locationStatus(Request $request)
    {
        try{
            $size = Location::find($request->location_id);
            $size->is_active = $request->status;
            $size->save();
            return response()->json(['message'=>'Location status changed successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
