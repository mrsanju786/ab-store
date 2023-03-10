<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Company;
use Log;
use Validator;

class CityController extends Controller
{
    public function index(){
        try{
            $city = City::get();
            return response()->json(['message'=>'City List!','status'=>true,'data'=>$city]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addCity(){

        $city = City::get();
        $state = State::get();
        return view('admin-view.city.add_city', compact('city','state'));
    }

    public function createCity(Request $request){
        try{ 
            $validator = Validator::make($request->all(), [
                'city_name' => 'required',
                'state_id' => 'required',
            ],[
                'state_name.required'=>'State Name is Required',
                'state_id.required'=>'State Code is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $city = new City();
            $city->city_name = $request->city_name;
            $city->state_id = $request->state_id;
            $city->save();

            DB::commit();
            return response()->json(['message'=>'City added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editCity($id){

        $city = City::find(base64_decode($id));
        $state = State::get();
        return view('admin-view.city.edit_city', compact('state','city'));
    }

    public function updateCity(Request $request){
        try{

            $validator = Validator::make($request->all(), [
                'city_name' => 'required',
                'state_id' => 'required',
            ],[
                'state_name.required'=>'State Name is Required',
                'state_id.required'=>'State Code is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $id = $request->city_id;
            $city = City::find($id);
            $city->city_name = $request->city_name;
            $city->state_id = $request->state_id;
            $city->save();
            
            DB::commit();
            return response()->json(['message'=>'City updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getCity($id){

        $city = City::where('state_id', $id)->get();

        return $city;
    }

    public function getCompanyCity($id){
        $company = Company::where('id', $id)->first();
        $city    = City::where('state_id', $company->state_id)->get();

        return $city;
    }
}
