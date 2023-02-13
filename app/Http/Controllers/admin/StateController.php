<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use App\Models\Region;

class StateController extends Controller
{
    public function index(){

        $state = State::get();
        $region = Region::get();
        return view('admin-view.state.index', compact('state','region'));
    }

    public function addState(){

        $country = Country::get();
        $region = Region::get();
        return view('admin-view.state.add_state', compact('country','region'));
    }

    public function createState(Request $request){

        $request->validate([
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

        $state = new State();
        $state->state_name = $request->state_name;
        $state->state_code = $request->state_code;
        $state->country_id = $request->country_id;
        $state->region_id = $request->region_id;
        $state->save();

        return redirect()->route('state_list')->with('success', 'State Added Successfully!');

    }

    public function editState($id){

        $state = State::find(base64_decode($id));
        $region = Region::get();
        $country = Country::get();
        return view('admin-view.state.edit_state', compact('state','region','country'));
    }

    public function updateState(Request $request){

        $request->validate([
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

        $id = $request->state_id;
        $state = State::find($id);
        $state->state_name = $request->state_name;
        $state->state_code = $request->state_code;
        $state->country_id = $request->country_id;
        $state->region_id = $request->region_id;
        $state->save();

        return redirect()->route('state_list')->with('success', 'Changes saved Successfully!');
    }
}
