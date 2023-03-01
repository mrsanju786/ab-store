<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use App\Models\Country;
use Auth;

class TimezoneController extends Controller
{
    public function index(){

        $timezone = Timezone::with('Country')->get();
        return view('admin-view.timezone.index', compact('timezone'));
    }

    public function addtimezone(){
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

        return view('admin-view.timezone.add_timezone', compact('country_list', 'timezone_list'));
    }

    public function createtimezone(Request $request){

        $request->validate([
            'zone_name' => 'required',
            'country_id' => 'required',
        ],[
            'zone_name.required'=>'Zone Name field is Required',
            'country_id.required'=>'Country field is Required',
        ]);

        $timezone = new Timezone();
        $timezone->zone_name = $request->zone_name;
        $timezone->start_time = "NA";
        $timezone->gmt_offset = "NA";
        $timezone->dst = "NA";
        $timezone->country_id = $request->country_id;
        $timezone->save();

        return redirect()->route('timezone-list')->with('success', 'Timezone Added Successfully!');

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

        $request->validate([
            'zone_name' => 'required',
            'country_id' => 'required',
        ],[
            'zone_name.required'=>'Zone Name field is Required',
            'country_id.required'=>'Country field is Required',
        ]);

        $timezone = Timezone::find($request->timezone_id);
        $timezone->zone_name = $request->zone_name;
        $timezone->start_time = "NA";
        $timezone->gmt_offset = "NA";
        $timezone->dst = "NA";
        $timezone->country_id = $request->country_id;
        $timezone->save();

        return redirect()->route('timezone-list')->with('success', 'Changes saved Successfully!');
    }
}

