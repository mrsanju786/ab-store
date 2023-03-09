<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodLicense;
use Auth;
use Log;
use Validator;

class FoodlicenseController extends Controller
{
    public function index(){
        try{
           $license = FoodLicense::get();
           return response()->json(['message'=>'License List!','status'=>true,'data'=>$license]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addFoodlicense(){

        return view('admin-view.foodlicense.add_license');
    }

    public function createFoodlicense(Request $request){
        try{

            $validator = Validator::make($request->all(), [
                'license_name' => 'required',
                'format_name' => 'required',
            ],[
                'license_name.required'=>'License Name is Required',
                'format_name.required'=>'Company Logo is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            $license = new FoodLicense();
            $license->name = $request->license_name;
            $license->format = $request->format_name;
            $license->save();

            return response()->json(['message'=>'License added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editFoodlicense($id){

        $license = FoodLicense::find(base64_decode($id));
        return view('admin-view.foodlicense.edit_license', compact('license'));
    }

    public function updateFoodlicense(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'license_name' => 'required',
                'format_name' => 'required',
            ],[
                'license_name.required'=>'License Name is Required',
                'format_name.required'=>'Company Logo is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $license = FoodLicense::find($request->license_id);
            $license->name = $request->license_name;
            $license->format = $request->format_name;
            $license->save();

            return response()->json(['message'=>'License updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
