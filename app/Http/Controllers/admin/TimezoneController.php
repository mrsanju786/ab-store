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
        return view('admin-view.timezone.add_timezone', compact('country_list'));
    }

    public function createtimezone(Request $request){

        $request->validate([
            'zone_name' => 'required',
            'start_time' => 'required',
            'gmt_offset' => 'required',
            'dst' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $timezone = new Timezone();
        $timezone->zone_name = $request->zone_name;
        $timezone->start_time = $request->start_time;
        $timezone->gmt_offset = $request->gmt_offset;
        $timezone->dst = $request->dst;
        $timezone->country_id = $request->country_id;
        $timezone->save();

        return redirect()->route('timezone-list')->with('success', 'Timezone Added Successfully!');

    }

    public function edittimezone($id){
        $country_list = Country::get();
        $timezone = Timezone::find(base64_decode($id));
        return view('admin-view.timezone.edit_timezone', compact('timezone', 'country_list'));
    }

    public function updatetimezone(Request $request){

        $request->validate([
            'zone_name' => 'required',
            'start_time' => 'required',
            'gmt_offset' => 'required',
            'dst' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $timezone = Timezone::find($request->timezone_id);
        $timezone->zone_name = $request->zone_name;
        $timezone->start_time = $request->start_time;
        $timezone->gmt_offset = $request->gmt_offset;
        $timezone->dst = $request->dst;
        $timezone->country_id = $request->country_id;
        $timezone->save();

        return redirect()->route('timezone-list')->with('success', 'Changes saved Successfully!');
    }
}

