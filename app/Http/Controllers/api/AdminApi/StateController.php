<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use App\Models\Region;
use Log;
use Validator;

class StateController extends Controller
{
    public function index(){
        try{
            $state = State::get();
            $region = Region::get();
            return response()->json(['message'=>'State List!','status'=>true,'data'=>['state'=>$state,'region'=>$region]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addState(){

        $country = Country::get();
        $region = Region::get();
        return view('admin-view.state.add_state', compact('country','region'));
    }

    public function createState(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'state_name' => 'required',
                'state_code' => 'required',
                'country_id' => 'required',
                'region_id' => 'required',
            ],[
                'state_name.required'=>'State Name is Required',
                'state_code.required'=>'State Code is Required',
                'country_id.required'=>'Country is Required',
                'region_id.required'=>'Region is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            $state = new State();
            $state->state_name = $request->state_name;
            $state->state_code = $request->state_code;
            $state->country_id = $request->country_id;
            $state->region_id = $request->region_id;
            $state->save();

            return response()->json(['message'=>'State added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editState($id){

        $state = State::find(base64_decode($id));
        $region = Region::get();
        $country = Country::get();
        return view('admin-view.state.edit_state', compact('state','region','country'));
    }

    public function updateState(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'state_name' => 'required',
                'state_code' => 'required',
                'country_id' => 'required',
                'region_id' => 'required',
            ],[
                'state_name.required'=>'State Name is Required',
                'state_code.required'=>'State Code is Required',
                'country_id.required'=>'Country is Required',
                'region_id.required'=>'Region is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $id = $request->state_id;
            $state = State::find($id);
            $state->state_name = $request->state_name;
            $state->state_code = $request->state_code;
            $state->country_id = $request->country_id;
            $state->region_id = $request->region_id;
            $state->save();

            return response()->json(['message'=>'State Updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getState($id){

        $state = State::where('country_id', $id)->get();

        return $state;
    }
}
