<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSizeVariant;
use App\Models\Product;
use Storage;

class ProductSizeVariantController extends Controller
{
    public function index(){

        $product = ProductSizeVariant::with('product')->orderBy('id','desc')->get();

        return view('admin-view.product_size.index', compact('product'));
    }

    public function create()
    {
        $product = Product::orderBy('id','desc')->get();
        
        return view('admin-view.product_size.create', compact('product'));
    }

    public function store(Request $request){

        $request->validate([
            'product_id'    => 'required',
            'size'          => 'required|unique:product_size_variants,size',
            'actual_price'  => 'required|numeric',
            'offer_price'   => 'required|numeric',
          
        ]);

        $product = new ProductSizeVariant();
        $product->product_id   = $request->product_id;
        $product->size         = $request->size;
        $product->actual_price = $request->actual_price;
        $product->offer_price  = $request->offer_price;
       
        $product->save();
        
        return redirect()->route('variantsize/index')->with('success', 'Product Size Added Successfully!');

    }

    public function edit($id){

        $productSize = ProductSizeVariant::find(base64_decode($id));
        $product = Product::orderBy('id','desc')->get();
        return view('admin-view.product_size.edit', compact('product','productSize'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'product_id'    => 'required',
            'size'          => 'required',
            'actual_price'  => 'required|numeric',
            'offer_price'   => 'required|numeric',
        ]);

        $product = ProductSizeVariant::find(base64_decode($id));
        $product->product_id   = $request->product_id;
        $product->size         = $request->size;
        $product->actual_price = $request->actual_price;
        $product->offer_price  = $request->offer_price;
        $product->save();


        return redirect()->route('variantsize/index')->with('success', 'Product Size updated successfully!');
    }

    public function delete($id){
        $record = ProductSizeVariant::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('variantsize/index')->with('success', 'Product Size deleted successfully!');
    
    }

    public function view($id){
        $record = ProductSizeVariant::where('id',base64_decode($id))->first();

        return view('admin-view.product_size.view',compact('record'));
    }
}
