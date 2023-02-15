<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax;
use Auth;

class TaxController extends Controller
{
    public function index(){

        $tax = Tax::get();
        return view('admin-view.tax.index', compact('tax'));
    }

    public function addTax(){
        return view('admin-view.tax.add_tax');
    }

    public function createTax(Request $request){

        $request->validate([
            'tax_name' => 'required',
            'tax_percent' => 'required',
        ]);

        $tax = new Tax();
        $tax->tax_name = $request->tax_name;
        $tax->tax_percent = $request->tax_percent;
        $tax->save();

        return redirect()->route('tax-list')->with('success', 'Tax Added Successfully!');

    }

    public function editTax($id){
        $tax = Tax::find(base64_decode($id));
        return view('admin-view.tax.edit_tax', compact('tax'));
    }

    public function updateTax(Request $request){

        $request->validate([
            'tax_name' => 'required',
            'tax_percent' => 'required',
        ]);

        $tax = Tax::find($request->tax_id);
        $tax->tax_name = $request->tax_name;
        $tax->tax_percent = $request->tax_percent;
        $tax->save();

        return redirect()->route('tax-list')->with('success', 'Changes saved Successfully!');
    }
}
