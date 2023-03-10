<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use App\Models\Country;
use Auth;
use Log;
use Validator;

class TimezoneController extends Controller
{
    public function index(){
        try{
           $timezone = Timezone::with('Country')->get();
           return response()->json(['message'=>'Timezone List!','status'=>true,'data'=> $timezone]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addtimezone(){
        try{
            $country_list = Country::get();

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://worldtimeapi.org/api/timezone',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $timezone_list = json_decode($response);
            return response()->json(['message'=>'Timezone List!','status'=>true,'data'=>['country_list'=>$country_list,'timezone_list'=>$timezone_list]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
        
    }

    public function createtimezone(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'zone_name' => 'required',
                'country_id' => 'required',
            ],[
                'zone_name.required'=>'Zone Name field is Required',
                'country_id.required'=>'Country field is Required',
            ]);


            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $timezone = new Timezone();
            $timezone->zone_name = $request->zone_name;
            $timezone->start_time = "NA";
            $timezone->gmt_offset = "NA";
            $timezone->dst = "NA";
            $timezone->country_id = $request->country_id;
            $timezone->save();

            DB::commit();

            return response()->json(['message'=>'Timezone added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function edittimezone($id){
        $country_list = Country::get();
        $timezone = Timezone::find(base64_decode($id));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://worldtimeapi.org/api/timezone',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $timezone_list = json_decode($response);

        return view('admin-view.timezone.edit_timezone', compact('timezone', 'country_list', 'timezone_list'));
    }

    public function updatetimezone(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'zone_name' => 'required',
                'country_id' => 'required',
            ],[
                'zone_name.required'=>'Zone Name field is Required',
                'country_id.required'=>'Country field is Required',
            ]);


            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            

            DB::beginTransaction();
            
            $timezone = Timezone::find($request->timezone_id);
            $timezone->zone_name = $request->zone_name;
            $timezone->start_time = "NA";
            $timezone->gmt_offset = "NA";
            $timezone->dst = "NA";
            $timezone->country_id = $request->country_id;
            $timezone->save();

            DB::commit();
            return response()->json(['message'=>'Timezone edited successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
