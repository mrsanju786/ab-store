<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;

class ProductColorController extends Controller
{
    public function index(){

        $productColor = ProductColor::orderBy('id','desc')->get();

        return view('admin-view.product_color.index', compact('productColor'));
    }

    public function create()
    {
        return view('admin-view.product_color.create');
    }

    public function store(Request $request){

        $request->validate([
            'color_name'       => 'required|unique:product_colors,color_name',
            'color_code'       => 'required'
        ]);

        $productColor = new ProductColor();
        $productColor->color_name = $request->color_name;
        $productColor->color_code = $request->color_code;
        $productColor->save();
        
        return redirect()->route('color/index')->with('success', 'Color Added Successfully!');

    }

    public function edit($id){

        $productColor = ProductColor::find(base64_decode($id));
       
        return view('admin-view.product_color.edit', compact('productColor'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'color_name'  => 'required',
            'color_code'=> 'required'
        ]);

        $productColor = ProductColor::find(base64_decode($id));
        $productColor->color_name = $request->color_name;
        $productColor->color_code = $request->color_code;
        $productColor->save();


        return redirect()->route('color/index')->with('success', 'Color updated successfully!');
    }

    public function delete($id){
        $record = ProductColor::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('color/index')->with('success', 'Color deleted successfully!');
    
    }

    public function view($id){
        $record = ProductColor::where('id',base64_decode($id))->first();

        return view('admin-view.product_color.view',compact('record'));
    }

    public function active($id){
        $record = ProductColor::where('id',base64_decode($id))->where('status',0)->update(['status'=>1]);
        return redirect()->route('color/index')->with('success', 'Color activated successfully!');
    }

    public function inActive($id){
        $record = ProductColor::where('id',base64_decode($id))->where('status',1)->update(['status'=>0]);
        return redirect()->route('color/index')->with('success', 'Color deactivated successfully!');
    }
}
