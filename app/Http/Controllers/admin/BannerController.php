<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use Storage;
use Str;

class BannerController extends Controller
{
    public function index(){

        $banner = Banner::orderBy('id','desc')->get();

        return view('admin-view.banner.index', compact('banner'));
    }

    public function create()
    {
        return view('admin-view.banner.create');
    }

    public function store(Request $request){

        $request->validate([
            'title'       => 'required',
            'file'       => 'required|image|mimes:jpeg,jpg,png',
            'description' => 'required',
          
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->slug = \Str::slug($request->title);
        $banner->description = $request->description;
       
        //add image 
        if ($request->file('file')) {
            $file = $request->file('file');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/banner/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->file));
            $banner->image = $imageName;
        } else{

            $banner->image = "blank.jpg";
        }

        $banner->save();
        
        return redirect()->route('banner/index')->with('success', 'Banner Added Successfully!');

    }

    public function edit($id){

        $banner = banner::find(base64_decode($id));
       
        return view('admin-view.banner.edit', compact('banner'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'title'       => 'required',
            'file'       => 'required|image|mimes:jpeg,jpg,png',
            'description' => 'required',
           
        ]);

        $banner = Banner::find(base64_decode($id));
        $banner->title = $request->title;
        $banner->description = $request->description;
       
         //add image 
         if ($request->file('file')) {
            $file = $request->file('file');
            $imageFileType = $file->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/banner/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->file));
            $banner->image = $imageName;
        } else{

            $banner->image = $request->old_image;
        }

        
        $banner->save();


        return redirect()->route('banner/index')->with('success', 'Banner updated successfully!');
    }

    public function delete($id){
        $record = Banner::where('id',base64_decode($id))->first();
        $record->delete();
        return redirect()->route('banner/index')->with('success', 'Banner deleted successfully!');
    
    }

    public function view($id){
        $record = Banner::where('id',base64_decode($id))->first();

        return view('admin-view.banner.view',compact('record'));
    }

    public function active($id){
        $record = Banner::where('id',base64_decode($id))->where('status',0)->update(['status'=>1]);
        return redirect()->route('banner/index')->with('success', 'Banner activated successfully!');
    }

    public function inActive($id){
        $record = Banner::where('id',base64_decode($id))->where('status',1)->update(['status'=>0]);
        return redirect()->route('banner/index')->with('success', 'Banner deactivated successfully!');
    }
}
