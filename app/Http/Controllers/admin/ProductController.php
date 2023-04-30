<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductColor;
use App\Models\ProductVariant;
use App\Models\ProductStock;
use Storage;
use Str;

class ProductController extends Controller
{
    public function index(){

        $product = Product::with(['category'])->get();

        return view('admin-view.product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::orderBy('id','desc')->get();
        $productOption = ProductOption::orderBy('id','desc')->get();
        $productColor = ProductColor::orderBy('id','desc')->get();
        return view('admin-view.product.create', compact('category','productOption','productColor'));
    }

    public function store(Request $request){

        $request->validate([
            'name'           => 'required',
            'category_id'    => 'required',
            // 'price'          => 'required',
            // 'discount'       => 'nullable',
            'product_type'   => 'required',
            // 'quantity'       => 'required',
            'image'          => 'nullable',
            'description'    => 'required',
          
        ]);

        $product = new Product();
        $product->name        = $request->name;
        $product->slug         = \Str::slug($request->name);
        // $product->price        = $request->price;
        // $product->discount     = $request->discount;
        $product->product_type = $request->product_type;
       // $product->quantity     = $request->quantity;
        $product->description  = $request->description;
        $product->category_id  = $request->category_id;
      
        //add image 
        //add image 
        if ($request->file('image')) {
            $file = $request->file('image');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/product/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->image));
            $product->image = $imageName;
        } else{

            $product->image = "blank.jpg";
        }

        $product->save();
        
        return redirect()->route('product/index')->with('success', 'Product Added Successfully!');

    }

    public function edit($id){

        $product = Product::find(base64_decode($id));
        $category   = Category::orderBy('id','desc')->get();
        $productOption = ProductOption::orderBy('id','desc')->get();
        $productColor = ProductColor::orderBy('id','desc')->get();
        return view('admin-view.product.edit', compact('category', 'product','productOption','productColor'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'name'           => 'required',
            'category_id'    => 'required',
            // 'price'          => 'required',
            // 'discount'       => 'nullable',
            'product_type'   => 'required',
            // 'quantity'       => 'required',
            'image'          => 'nullable',
            'description'    => 'required',
        ]);

        $product = Product::find(base64_decode($id));
        $product->name = $request->name;
        $product->description = $request->description;
        // $product->price        = $request->price;
        // $product->discount     = $request->discount;
        $product->product_type = $request->product_type;
      //  $product->quantity     = $request->quantity;
        $product->category_id = $request->category_id;

         //add image 
         if ($request->file('image')) {
            $file = $request->file('image');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/product/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->image));
            $product->image = $imageName;
        } else{

            $product->image = $request->old_image;
        }
        $product->save();


        return redirect()->route('product/index')->with('success', 'Product updated successfully!');
    }

    public function delete($id){
        $record = Product::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('product/index')->with('success', 'Product deleted successfully!');
    
    }

    public function view($id){
        $record = Product::with('category')->where('id',base64_decode($id))->first();

        return view('admin-view.product.view',compact('record'));
    }

}
