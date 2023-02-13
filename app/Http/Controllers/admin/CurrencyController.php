<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Country;
use Auth;

class CurrencyController extends Controller
{
    public function index(){

        $currency = Currency::with('Country')->get();
        return view('admin-view.currency.index', compact('currency'));
    }

    public function addcurrency(){
        $country_list = Country::get();
        return view('admin-view.currency.add_currency', compact('country_list'));
    }

    public function createcurrency(Request $request){

        $request->validate([
            'currency_name' => 'required',
            'currency_code' => 'required',
            'symbol' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $currency = new Currency();
        $currency->currency_name = $request->currency_name;
        $currency->currency_code = $request->currency_code;
        $currency->symbol = $request->symbol;
        $currency->country_id = $request->country_id;
        $currency->save();

        return redirect()->route('currency-list')->with('success', 'Currency Added Successfully!');

    }

    public function editcurrency($id){
        $country_list = Country::get();
        $currency = Currency::find(base64_decode($id));
        return view('admin-view.currency.edit_currency', compact('currency', 'country_list'));
    }

    public function updatecurrency(Request $request){

        $request->validate([
            'currency_name' => 'required',
            'currency_code' => 'required',
            'symbol' => 'required',
            'country_id' => 'required',
        ],[
            'country_id.required'=>'Country field is Required',
        ]);

        $currency = Currency::find($request->currency_id);
        $currency->currency_name = $request->currency_name;
        $currency->currency_code = $request->currency_code;
        $currency->symbol = $request->symbol;
        $currency->country_id = $request->country_id;
        $currency->save();

        return redirect()->route('currency-list')->with('success', 'Changes saved Successfully!');
    }
}
