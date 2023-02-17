<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Company;

class CityController extends Controller
{
    public function index(){

        $city = City::get();
        return view('admin-view.city.index', compact('city'));
    }

    public function addCity(){

        $city = City::get();
        $state = State::get();
        return view('admin-view.city.add_city', compact('city','state'));
    }

    public function createCity(Request $request){

        $request->validate([
            'city_name' => 'required',
            'state_id' => 'required',
        ],[
            'state_name.required'=>'State Name is Required',
            'state_id.required'=>'State Code is Required',
        ]);

        $city = new City();
        $city->city_name = $request->city_name;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->route('city_list')->with('success', 'City Added Successfully!');

    }

    public function editCity($id){

        $city = City::find(base64_decode($id));
        $state = State::get();
        return view('admin-view.city.edit_city', compact('state','city'));
    }

    public function updateCity(Request $request){

        $request->validate([
            'city_name' => 'required',
            'state_id' => 'required',
        ],[
            'state_name.required'=>'State Name is Required',
            'state_id.required'=>'State Code is Required',
        ]);

        $id = $request->city_id;
        $city = City::find($id);
        $city->city_name = $request->city_name;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->route('city_list')->with('success', 'Changes saved Successfully!');
    }

    public function getCity($id){

        $city = City::where('state_id', $id)->get();

        return $city;
    }

    public function getCompanyCity($id){
        $company = Company::where('id', $id)->first();
        $city = City::where('state_id', $company->state_id)->get();

        return $city;
    }
}
