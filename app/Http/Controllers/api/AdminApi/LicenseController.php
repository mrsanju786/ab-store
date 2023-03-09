<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Country;
use Auth;
use Log;
use Validator;

class LicenseController extends Controller
{
    public function index(){
        try{
          $license = License::with('Country')->get();
          return response()->json(['message'=>'License List!','status'=>true,'data'=>$license]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addlicense(){
        $country_list = Country::get();
        return view('admin-view.license.add_license', compact('country_list'));
    }

    public function createlicense(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'license_name' => 'required',
                'format' => 'required',
                'alises_name' => 'required',
                'example' => 'required',
                'country_id' => 'required',
            ],[
                'country_id.required'=>'Country field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            $license = new License();
            $license->license_name = $request->license_name;
            $license->format = $request->format;
            $license->alises_name = $request->alises_name;
            $license->example = $request->example;
            $license->country_id = $request->country_id;
            $license->save();

            return response()->json(['message'=>'License added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editlicense($id){
        $country_list = Country::get();
        $license = License::find(base64_decode($id));
        return view('admin-view.license.edit_license', compact('license', 'country_list'));
    }

    public function updatelicense(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'license_name' => 'required',
                'format' => 'required',
                'alises_name' => 'required',
                'example' => 'required',
                'country_id' => 'required',
            ],[
                'country_id.required'=>'Country field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $license = License::find($request->license_id);
            $license->license_name = $request->license_name;
            $license->format = $request->format;
            $license->alises_name = $request->alises_name;
            $license->example = $request->example;
            $license->country_id = $request->country_id;
            $license->save();

            return response()->json(['message'=>'License updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
