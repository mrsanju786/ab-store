<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Storage;

class CategoryController extends Controller
{
    public function index(){

        $category = Category::orderBy('id','desc')->get();
        return view('admin-view.product_category.index', compact('category'));
    }

    public function create()
    {
        return view('admin-view.product_category.create');
    }

    public function store(Request $request){

        // return $request->all();
        $request->validate([
            'title'  => 'required|unique:categories,title',
            'file'   =>'required|image',
            // 'status' => 'required',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->slug = \Str::slug($request->title);
       
        //add image 
        if ($request->file('file')) {
            $file = $request->file('file');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/category/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->file));
            $category->image = $imageName;
        } else{

            $category->image = "blank.jpg";
        }
        $category->save();

        return redirect()->route('category/index')->with('success', 'Category Added Successfully!');

    }

    public function edit($id){

        $category = Category::find(base64_decode($id));
       
        return view('admin-view.product_category.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image'
            //'status' => 'required',
        ]);


        $category = Category::find(base64_decode($id));
       
        $category->title = $request->title;
        //add image 
        if ($request->file('file')) {
            $file = $request->file('file');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/category/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->file));
            $category->image = $imageName;
        } else{

            $category->image = $request->old_image;
        }

        $category->save();
        
        return redirect()->route('category/index')->with('success', 'Category updated Successfully!');
    }

    public function delete($id){
        $record = Category::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('category/index')->with('success', 'Category deleted successfully!');
    
    }

    public function view($id){
        $record = Category::where('id',base64_decode($id))->first();

        return view('admin-view.product_category.view',compact('record'));
    }
}
