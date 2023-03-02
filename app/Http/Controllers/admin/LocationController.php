<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\State;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Company;
use App\Models\Discount;
use Auth;
use Carbon\Carbon;

class LocationController extends Controller
{
    public function index(){
        $location = Location::get();
        return view('admin-view.location.index', compact('location'));
    }

    public function addLocation()
    {
        $discount = Discount::get();
        $state = State::get();
        $branch = Branch::where('is_active', 1)->get();
        return view('admin-view.location.add_location', compact('state','branch','discount'));
    }

    public function createLocation(Request $request){

        $request->validate([
            'location_address' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'vip_percent' => 'required',
            'vvip_percent' => 'required',
            'license_name' => 'required',
            'license_format' => 'required',
            'branch_id' => 'required',
        ]);

        $location = new Location();
        $location->address = $request->location_address;
        $location->state_id = $request->state_id;
        $location->city_id = $request->city_id;
        $location->pincode = $request->pincode;
        $location->edited_at = Carbon::now();
        $location->edited_by = Auth::user()->id;
        $location->vip_percent = $request->vip_percent;
        $location->vvip_percent = $request->vvip_percent;
        $location->license_name = $request->license_name;
        $location->license_format = $request->license_format;
        $location->branch_id = $request->branch_id;
        $branch_detail = Branch::find($request->branch_id);
        $company = Company::find($branch_detail->company_id);
        $location->country_id = $company->country_id;
        $location->discount_ids = $request->discount_id;
        $location->save();

        return redirect()->route('location_list')->with('success', 'Location Added Successfully!');

    }

    public function editLocation($id){
        $location = Location::find(base64_decode($id));
        $branch = Branch::where('is_active', 1)->get();
        $state = State::get();
        $discount = Discount::get();
        return view('admin-view.location.edit_location', compact('location','branch','state','discount'));
    }

    public function updateLocation(Request $request){

        $request->validate([
            'location_address' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'vip_percent' => 'required',
            'vvip_percent' => 'required',
            'license_name' => 'required',
            'license_format' => 'required',
            'branch_id' => 'required',
        ]);

        // $id = $request->branch_id;
        $location_id = $request->location_id;
        // dd($request->location_id);
        $location = Location::find($location_id);
        $location->address = $request->location_address;
        $location->state_id = $request->state_id;
        $location->city_id = $request->city_id;
        $location->pincode = $request->pincode;
        $location->edited_at = Carbon::now();
        $location->edited_by = Auth::user()->id;
        $location->vip_percent = $request->vip_percent;
        $location->vvip_percent = $request->vvip_percent;
        $location->license_name = $request->license_name;
        $location->license_format = $request->license_format;
        $location->branch_id = $request->branch_id;
        $branch_detail = Branch::find($request->branch_id);
        $company = Company::find($branch_detail->company_id);
        $location->country_id = $company->country_id;
        $location->discount_ids = $request->discount_id;
        $location->save();

        return redirect()->route('location_list')->with('success', 'Changes saved Successfully!');
    }

    public function locationStatus(Request $request)
    {
        $size = Location::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success', 'Location status updated!');
    }
}
