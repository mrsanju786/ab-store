<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodLicense;
use Auth;

class FoodlicenseController extends Controller
{
    public function index(){

        $license = FoodLicense::get();
        return view('admin-view.foodlicense.index', compact('license'));
    }

    public function addFoodlicense(){

        return view('admin-view.foodlicense.add_license');
    }

    public function createFoodlicense(Request $request){

        $request->validate([
            'license_name' => 'required',
            'format_name' => 'required',
        ],[
            'license_name.required'=>'License Name is Required',
            'format_name.required'=>'Company Logo is Required',
        ]);

        $license = new FoodLicense();
        $license->name = $request->license_name;
        $license->format = $request->format_name;
        $license->save();

        return redirect()->route('foodlicense_list')->with('success', 'License Added Successfully!');

    }

    public function editFoodlicense($id){

        $license = FoodLicense::find(base64_decode($id));
        return view('admin-view.foodlicense.edit_license', compact('license'));
    }

    public function updateFoodlicense(Request $request){

        $request->validate([
            'license_name' => 'required',
            'format_name' => 'required',
        ],[
            'license_name.required'=>'License Name is Required',
            'format_name.required'=>'Company Logo is Required',
        ]);

        $license = FoodLicense::find($request->license_id);
        $license->name = $request->license_name;
        $license->format = $request->format_name;
        $license->save();

        return redirect()->route('foodlicense_list')->with('success', 'Changes saved Successfully!');
    }
}
