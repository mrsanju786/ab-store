<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryTax;
use App\Models\Country;
use Auth;

class CountryTaxController extends Controller
{
    public function index(){

        $countrytax = CountryTax::with('Country')->get();
        return view('admin-view.country_tax.index', compact('countrytax'));
    }

    public function addcountrytax(){
        $country_list = Country::get();
        return view('admin-view.country_tax.add_country_tax', compact('country_list'));
    }

    public function createcountrytax(Request $request){

        $request->validate([
            'tax_name' => 'required',
            'tax_percent' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $countrytax = new Countrytax();
        $countrytax->name = $request->tax_name;
        $countrytax->tax_percent = $request->tax_percent;
        $countrytax->country_id = $request->country_id;
        $countrytax->save();

        return redirect()->route('countrytax-list')->with('success', 'Countrytax Added Successfully!');

    }

    public function editcountrytax($id){
        $country_list = Country::get();
        $countrytax = CountryTax::find(base64_decode($id));
        return view('admin-view.country_tax.edit_country_tax', compact('countrytax', 'country_list'));
    }

    public function updatecountrytax(Request $request){

        $request->validate([
            'tax_name' => 'required',
            'tax_percent' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $countrytax = CountryTax::find($request->countrytax_id);
        $countrytax->name = $request->tax_name;
        $countrytax->tax_percent = $request->tax_percent;
        $countrytax->country_id = $request->country_id;
        $countrytax->save();

        return redirect()->route('countrytax-list')->with('success', 'Changes saved Successfully!');
    }

    public function countrytaxStatus(Request $request)
    {
        $countrytax = CountryTax::find($request->id);
        $countrytax->is_active = $request->status;
        $countrytax->save();
        return redirect()->back()->with('success','Countrytax status updated!');
    }
}
