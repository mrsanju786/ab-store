<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOption;

class ProductOptionController extends Controller
{
    public function index(){

        $productOption = ProductOption::orderBy('id','desc')->get();

        return view('admin-view.product_option.index', compact('productOption'));
    }

    public function create()
    {
        return view('admin-view.product_option.create');
    }

    public function store(Request $request){

        $request->validate([
            'product_size'       => 'required|unique:product_options,product_size',
            'product_type'       => 'required',
        ]);

        $productOption = new ProductOption();
        $productOption->product_size = $request->product_size;
        $productOption->product_type = $request->product_type;
        $productOption->save();
        
        return redirect()->route('option/index')->with('success', 'Product Option Added Successfully!');

    }

    public function edit($id){

        $productOption = ProductOption::find(base64_decode($id));
       
        return view('admin-view.product_option.edit', compact('productOption'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'product_size'       => 'required',
            'product_type'       => 'required',

        ]);

        $productOption = ProductOption::find(base64_decode($id));
        $productOption->product_size = $request->product_size;
        $productOption->product_type = $request->product_type;
        $productOption->save();

        return redirect()->route('option/index')->with('success', 'Product Option updated successfully!');
    }

    public function delete($id){
        $record = ProductOption::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('option/index')->with('success', 'Product Option deleted successfully!');
    
    }

    public function view($id){
        $record = ProductOption::where('id',base64_decode($id))->first();

        return view('admin-view.product_option.view',compact('record'));
    }

    public function active($id){
        $record = ProductOption::where('id',base64_decode($id))->where('status',0)->update(['status'=>1]);
        return redirect()->route('option/index')->with('success', 'Product Option activated successfully!');
    }

    public function inActive($id){
        $record = ProductOption::where('id',base64_decode($id))->where('status',1)->update(['status'=>0]);
        return redirect()->route('option/index')->with('success', 'Product Option deactivated successfully!');
    }
}
