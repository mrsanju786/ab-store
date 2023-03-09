<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryHasMenu;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\Menu;
use Storage;
use Log;
use Validator;

class CategoryController extends Controller
{
    public function index(){
        try{
            $category = Category::with(['Branch', 'Counter'])->get();
            return response()->json(['message'=>'Category List!','status'=>true,'data'=>$category]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createCategory(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
                'branch_id' => 'required',
                'counter_id' => 'required',
                'category_type' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->item_type = $request->item_type;
            $category->branch_id = $request->branch_id;
            $category->counter_id = $request->counter_id;
            $category->category_type = $request->category_type;

            if ($request->file('category_image')) {
                $imageFileType = $request->category_image->getClientOriginalExtension();
                $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
                $dir = "/upload/category/";
                if (!Storage::disk('public')->exists($dir)) {
                    Storage::disk('public')->makeDirectory($dir);
                }
                Storage::disk('public')->put($dir . $imageName, file_get_contents($request->category_image));
                $category->images = $imageName;
            }

            $category->save();

            if ($request->has('menu_id')) {
                foreach($request->menu_id as $menu_id){
                    $category_has_menu = new CategoryHasMenu();
                    $category_has_menu->category_id = $category->id;
                    $category_has_menu->menu_id = $menu_id;
                    $category_has_menu->save();
                }
            }
            
            return response()->json(['message'=>'Category added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function updateCategory(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
                'branch_id' => 'required',
                'counter_id' => 'required',
                'category_type' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $id = $request->category_id;
            $category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->item_type = $request->item_type;
            $category->branch_id = $request->branch_id;
            $category->counter_id = $request->counter_id;
            $category->category_type = $request->category_type;

            if ($request->file('category_image')) {
                $imageFileType = $request->category_image->getClientOriginalExtension();
                $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
                $dir = "/upload/category/";
                if (!Storage::disk('public')->exists($dir)) {
                    Storage::disk('public')->makeDirectory($dir);
                }
                Storage::disk('public')->put($dir . $imageName, file_get_contents($request->category_image));
                $category->images = $imageName;
            }

            $category->save();

            if ($request->has('menu_id')) {
                CategoryHasMenu::where('category_id', $request->category_id)->delete();
                foreach($request->menu_id as $menu_id){
                    $category_has_menu = new CategoryHasMenu();
                    $category_has_menu->category_id = $request->category_id;
                    $category_has_menu->menu_id = $menu_id;
                    $category_has_menu->save();
                }
            }
            return response()->json(['message'=>'Category updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getCategory($id){
        $category = Category::where('counter_id', $id)->get();
        return $category;
    }
}
