<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Log;
use Validator;

class CountryController extends Controller
{
    public function index(){
        try{
            $country = Country::get();
            return response()->json(['message'=>'Country List!','status'=>true,'data'=>$country]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createCountry(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'country_name' => 'required',
                'country_code' => 'required',

            ],[
                'country_name.required'=>'Country name is Required',
                'country_code.required'=>'Country code is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $country = new Country();
            $country->country_name = $request->country_name;
            $country->country_code = $request->country_code;
            $country->save();

            DB::commit();
            return response()->json(['message'=>'Country added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editCountry($id){

        $country = Country::find(base64_decode($id));
        return view('admin-view.country.edit_country', compact('country'));
    }

    public function updateCountry(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'country_name' => 'required',
                'country_code' => 'required',

            ],[
                'country_name.required'=>'Country name is Required',
                'country_code.required'=>'Country code is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $id = $request->country_id;
            $country = Country::find($id);
            $country->country_name = $request->country_name;
            $country->country_code = $request->country_code;
            $country->save();

            DB::commit();
            return response()->json(['message'=>'Country updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
