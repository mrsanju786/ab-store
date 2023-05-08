<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColorVariant;
use App\Models\ProductSizeVariant;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductColor;
use Storage;

class ProductColorVariantController extends Controller
{
    public function index(){

        $product = ProductColorVariant::with('product')->orderBy('id','desc')->get();

        return view('admin-view.product_color.index', compact('product'));
    }

    public function create()
    {
        $product = Product::orderBy('id','desc')->get();
       
        return view('admin-view.product_color.create', compact('product'));
    }

    public function store(Request $request){

        $request->validate([
            'product_id'            => 'required',
            'color_name'            => 'required',
            'color_code'            => 'nullable',
            'file'                  => 'required|image|mimes:jpeg,png,jpg',
            'extra_amount'          => 'nullable|numeric',
          
        ]);

        $product = new ProductColorVariant();
        $product->product_id        = $request->product_id;
        $product->color_name        = $request->color_name;
        $product->color_code     = $request->color_code;
        $product->extra_amount = $request->extra_amount;
        //add image 
        if ($request->file('file')) {
            $file = $request->file('file');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/product/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->file));
            $product->color_product_image = $imageName;
        } else{

            $product->color_product_image = "blank.jpg";
        }

        $product->save();
        
        return redirect()->route('variantcolor/index')->with('success', 'Product Color Added Successfully!');

    }

    public function edit($id){

        $productColor = ProductColorVariant::find(base64_decode($id));
        $product = Product::orderBy('id','desc')->get();
        return view('admin-view.product_color.edit', compact('product','productColor'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'product_id'            => 'required',
            'color_name'            => 'required',
            'color_code'            => 'nullable',
            'file'                  => 'nullable|image|mimes:jpeg,png,jpg',
            'extra_amount'          => 'nullable|numeric',
        ]);

        $product = ProductColorVariant::find(base64_decode($id));
        $product->product_id        = $request->product_id;
        $product->color_name        = $request->color_name;
        $product->color_code        = $request->color_code;
        $product->extra_amount      = $request->extra_amount;

         //add image 
         if ($request->file('file')) {
            $file = $request->file('file');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/product/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->file));
            $product->color_product_image = $imageName;
        } else{

            $product->color_product_image = $request->old_image;
        }
        $product->save();


        return redirect()->route('variantcolor/index')->with('success', 'Product Color updated successfully!');
    }

    public function delete($id){
        $record = ProductColorVariant::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('variantcolor/index')->with('success', 'Product Color deleted successfully!');
    
    }

    public function view($id){
        $record = ProductColorVariant::with('category')->where('id',base64_decode($id))->first();

        return view('admin-view.product_color.view',compact('record'));
    }

    public function active($id){
        $record = ProductColorVariant::where('id',base64_decode($id))->where('status',0)->update(['status'=>1]);
        return redirect()->route('variantcolor/index')->with('success', 'Product Color activated successfully!');
    }

    public function inActive($id){
        $record = ProductColorVariant::where('id',base64_decode($id))->where('status',1)->update(['status'=>0]);
        return redirect()->route('variantcolor/index')->with('success', 'Product Color deactivated successfully!');
    }
}
