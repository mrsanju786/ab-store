<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Country;
use Auth;

class LicenseController extends Controller
{
    public function index(){

        $license = License::with('Country')->get();
        return view('admin-view.license.index', compact('license'));
    }

    public function addlicense(){
        $country_list = Country::get();
        return view('admin-view.license.add_license', compact('country_list'));
    }

    public function createlicense(Request $request){

        $request->validate([
            'license_name' => 'required',
            'format' => 'required',
            'alises_name' => 'required',
            'example' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $license = new License();
        $license->license_name = $request->license_name;
        $license->format = $request->format;
        $license->alises_name = $request->alises_name;
        $license->example = $request->example;
        $license->country_id = $request->country_id;
        $license->save();

        return redirect()->route('license-list')->with('success', 'License Added Successfully!');

    }

    public function editlicense($id){
        $country_list = Country::get();
        $license = License::find(base64_decode($id));
        return view('admin-view.license.edit_license', compact('license', 'country_list'));
    }

    public function updatelicense(Request $request){

        $request->validate([
            'license_name' => 'required',
            'format' => 'required',
            'alises_name' => 'required',
            'example' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $license = License::find($request->license_id);
        $license->license_name = $request->license_name;
        $license->format = $request->format;
        $license->alises_name = $request->alises_name;
        $license->example = $request->example;
        $license->country_id = $request->country_id;
        $license->save();

        return redirect()->route('license-list')->with('success', 'Changes saved Successfully!');
    }
}
