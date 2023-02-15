<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationTax;
use App\Models\Tax;
use App\Models\Location;
use Auth;

class LocationTaxController extends Controller
{
    public function index(){
        $location_tax = LocationTax::with(['Tax', 'Location'])->get();
        return view('admin-view.location_tax.index', compact('location_tax'));
    }

    public function addLocationTax(){
        $tax_list = Tax::get();
        $location_list = Location::get();
        return view('admin-view.location_tax.add_location_tax', compact('tax_list', 'location_list'));
    }

    public function createLocationTax(Request $request){

        $request->validate([
            'tax_percent' => 'required',
            'tax_id' => 'required',
            'location_id' => 'required',
        ]);

        $location_tax = new LocationTax();
        $location_tax->tax_percent = $request->tax_percent;
        $location_tax->tax_id = $request->tax_id;
        $location_tax->location_id = $request->location_id;
        $location_tax->save();

        return redirect()->route('location-tax-list')->with('success', 'Location tax Added Successfully!');

    }

    public function editLocationTax($id){
        $tax_list = Tax::get();
        $location_list = Location::get();
        $location_tax = LocationTax::find(base64_decode($id));
        return view('admin-view.location_tax.edit_location_tax', compact('location_tax', 'tax_list', 'location_list'));
    }

    public function updateLocationTax(Request $request){

        $request->validate([
            'tax_percent' => 'required',
            'tax_id' => 'required',
            'location_id' => 'required',
        ]);

        $location_tax = LocationTax::find($request->location_tax_id);
        $location_tax->tax_percent = $request->tax_percent;
        $location_tax->tax_id = $request->tax_id;
        $location_tax->location_id = $request->location_id;
        $location_tax->save();

        return redirect()->route('location-tax-list')->with('success', 'Changes saved Successfully!');
    }

    public function locationTaxStatus(Request $request)
    {
        $size = LocationTax::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Location Tax status updated!');
    }
}
