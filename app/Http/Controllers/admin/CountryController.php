<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(){

        $country = Country::get();
        return view('admin-view.country.index', compact('country'));
    }

    public function addCountry(){

        return view('admin-view.country.add_country');
    }

    public function createCountry(Request $request){

        $request->validate([
            'country_name' => 'required',
            'country_code' => 'required',

        ],[
            'country_name.required'=>'Country Name is Required',
            'country_code.required'=>'Company Logo is Required',
        ]);

        $country = new Country();
        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();

        return redirect()->route('country_list')->with('success', 'Company Added Successfully!');

    }

    public function editCountry($id){

        $country = Country::find(base64_decode($id));
        return view('admin-view.country.edit_country', compact('country'));
    }

    public function updateCountry(Request $request){

        $request->validate([
            'country_name' => 'required',
            'country_code' => 'required',

        ],[
            'country_name.required'=>'Country Name is Required',
            'country_code.required'=>'Company Logo is Required',
        ]);

        $id = $request->country_id;
        $country = Country::find($id);
        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();

        return redirect()->route('country_list')->with('success', 'Changes saved Successfully!');
    }
}
