<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Company;
use App\Models\Country;
use Auth;

class RegionController extends Controller
{
    public function index(){

        $region = Region::get();
        return view('admin-view.region.index', compact('region'));
    }

    public function addRegion(){

        $country = Country::get();
        return view('admin-view.region.add_region', compact('country'));
    }

    public function createRegion(Request $request){

        $request->validate([
            'region_name' => 'required',
            'country_id' => 'required',
        ],[
            'region_name.required'=>'Region Name is Required',
            'country_id.required'=>'country Id is Required',
        ]);

        $license = new Region();
        $license->region_name = $request->region_name;
        $license->country_id = $request->country_id;
        $license->save();

        return redirect()->route('region_list')->with('success', 'Region Added Successfully!');

    }

    public function editRegion($id){

        $region = Region::find(base64_decode($id));
        $country = Country::get();
        return view('admin-view.region.edit_region', compact('region','country'));
    }

    public function updateRegion(Request $request){

        $request->validate([
            'region_name' => 'required',
            'country_id' => 'required',
        ],[
            'region_name.required'=>'Region Name is Required',
            'country_id.required'=>'Country Id is Required',
        ]);

        $license = Region::find($request->region_id);
        $license->region_name = $request->region_name;
        $license->country_id = $request->country_id;
        $license->save();

        return redirect()->route('region_list')->with('success', 'Changes saved Successfully!');
    }

    public function regionStatus(Request $request)
    {
        $size = Region::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Region status updated!');
    }
}
