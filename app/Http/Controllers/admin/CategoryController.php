<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryHasMenu;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\Menu;
use Storage;

class CategoryController extends Controller
{
    public function index(){

        $category = Category::with(['Branch', 'Counter'])->get();
        return view('admin-view.category.index', compact('category'));
    }

    public function addCategory()
    {
        $branch = Branch::where('is_active', 1)->get();
        $counter = Counter::get();
        $menu = Menu::get();
        return view('admin-view.category.add_category', compact('branch', 'counter', 'menu'));
    }

    public function createCategory(Request $request){

        $request->validate([
            'category_name' => 'required',
            'branch_id' => 'required',
            'counter_id' => 'required',
            'category_type' => 'required',
        ]);

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
        
        return redirect()->route('category-list')->with('success', 'Category Added Successfully!');

    }

    public function editCategory($id){

        $category = Category::find(base64_decode($id));
        $branch = Branch::where('is_active', 1)->get();
        $counter = Counter::get();
        $menu = Menu::get();
        $category_has_menu = CategoryHasMenu::where('category_id', base64_decode($id))->pluck('menu_id')->toArray();
        return view('admin-view.category.edit_category', compact('category', 'branch', 'counter', 'menu', 'category_has_menu'));
    }

    public function updateCategory(Request $request){

        $request->validate([
            'category_name' => 'required',
            'branch_id' => 'required',
            'counter_id' => 'required',
            'category_type' => 'required',
        ]);

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
        return redirect()->route('category-list')->with('success', 'Changes saved Successfully!');
    }
}
