<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationDiscount;
use App\Models\Location;

class LocationDiscountController extends Controller
{
    public function index(){
        $locationDiscount = LocationDiscount::get();
        return view('admin-view.locationdiscount.index', compact('locationDiscount'));
    }

    public function addLocationDiscount()
    {
        $location = Location::where('is_active', 1)->get();
        return view('admin-view.locationdiscount.add_discount', compact('location'));
    }

    public function createLocationDiscount(Request $request){

        $request->validate([
            'discount_name' => 'required',
            'discount_percent' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location_id' => 'required',
        ]);

        $locationDiscount = new LocationDiscount();
        $locationDiscount->	discount_name = $request->discount_name;
        $locationDiscount->discount_percent = $request->discount_percent;
        $locationDiscount->start_date = $request->start_date;
        $locationDiscount->end_date = $request->end_date;
        $locationDiscount->location_id = $request->location_id;
        $locationDiscount->save();

        return redirect()->route('location-discount-list')->with('success', 'Location Discount Added Successfully!');

    }

    public function editLocationDiscount($id){
        $locationDiscount = LocationDiscount::find(base64_decode($id));
        $location = Location::where('is_active', 1)->get();
        return view('admin-view.locationdiscount.edit_discount', compact('locationDiscount','location'));
    }

    public function updateLocationDiscount(Request $request){

        $request->validate([
            'discount_name' => 'required',
            'discount_percent' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location_id' => 'required',
        ]);

        $id = $request->locationDiscount_id;
        $locationDiscount = LocationDiscount::find($id);
        $locationDiscount->	discount_name = $request->discount_name;
        $locationDiscount->discount_percent = $request->discount_percent;
        $locationDiscount->start_date = $request->start_date;
        $locationDiscount->end_date = $request->end_date;
        $locationDiscount->location_id = $request->location_id;
        $locationDiscount->save();

        return redirect()->route('location-discount-list')->with('success', 'Changes saved Successfully!');
    }

    public function LocationDiscountStatus(Request $request)
    {
        $size = LocationDiscount::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success', 'Location status updated!');
    }
}
