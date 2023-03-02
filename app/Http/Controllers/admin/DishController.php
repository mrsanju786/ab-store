<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Counter;
use App\Models\DishVariant;
use App\Models\Extra;
use App\Models\Addon;
use App\Models\Category;
use App\Models\Branch;
use App\Models\CountryTax;
use App\Models\DishHasTax;
use Storage;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class DishController extends Controller
{
    public function index(){

        $dish = Dish::get();
        return view('admin-view.dish.index', compact('dish'));
    }

    public function addDish(){

        $counter = Counter::get();
        return view('admin-view.dish.add-dish', compact('counter'));
    }

    public function createDish(Request $request){

        $request->validate([
            'dish_name' => 'required',
            'dish_hsn' => 'required',
            'counter_id' => 'required',
            'category_id' => 'required',
            'tax_inc' => 'required',
            'dish_has_variant' => 'required',
            'tax_id' => 'required',

        ],[
            'dish_name.required'=>'Dish Name is Required',
            'dish_hsn.required'=>'CIN No. is required',
            'counter_id.required'=>'Registered Address is required',
            'tax_inc.required'=>'Tax option is required',
            'dish_has_variant.required'=>'state_id is required',
        ]);

        $dish = new Dish();
        $dish->dish_name = $request->dish_name;
        $dish->dish_price = $request->dish_price;
        $dish->dish_code = $request->dish_code;
        $dish->dish_hsn = $request->dish_hsn;
        $dish->category_id = $request->category_id;
        $dish->counter_id = $request->counter_id;
        $dish->is_tax_inclusive = $request->tax_inc;
        $dish->has_variant = $request->dish_has_variant;
        $dish->chef_preparation = !empty($request->chef_preparation)? $request->chef_preparation : 0;
        
        if ($request->file('dish_image')) {
            $imageFileType = $request->dish_image->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/dish/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->dish_image));
            $dish->dish_images = $imageName;
        }else{

            $dish->dish_images = "blank.jpg";
        }

        $dish->save();

        $dishTax = new DishHasTax();
        $dishTax->tax_id = $request->tax_id;
        $dishTax->dish_id = $dish->id;
        $dishTax->save();

        if($request->dish_has_variant == 1){

            return redirect()->route('edit-dish', ['id'=>base64_encode($dish->id)])->with('success', 'Saved Successfully!');
        }else{

            return redirect()->route('dish-list')->with('success', 'Dish Added Successfully!');
        }

    }

    public function editDish($id){

        $dish = Dish::find(base64_decode($id));
        $counter = Counter::get();
        $variant = DishVariant::where('dish_id', $dish->id)->get();
        $extra = Extra::where('dish_id', $dish->id)->get();
        $addon = Addon::where('dish_id', $dish->id)->get();
        $dish_tax = DishHasTax::where('dish_id', $dish->id)->first();
        $dishTax =  $dish_tax->tax_id;
        return view('admin-view.dish.edit-dish', compact('dish','counter', 'variant', 'extra', 'addon','dishTax'));
    }

    public function updateDish(Request $request){
        
        $request->validate([
            'dish_name' => 'required',
            'dish_hsn' => 'required',
            'counter_id' => 'required',
            'category_id' => 'required',
            'tax_inc' => 'required',
            'dish_has_variant' => 'required',
            'tax_id' => 'required',

        ],[
            'dish_name.required'=>'Dish Name is Required',
            'dish_hsn.required'=>'HSN No is required',
            'counter_id.required'=>'Registered Address is required',
            'tax_inc.required'=>'Tax option is required',
            'dish_has_variant.required'=>'state_id is required',
        ]);

        $id = $request->dish_id;
        $dish = Dish::find($id);
        $dish->dish_name = $request->dish_name;
        $dish->dish_price = $request->dish_price;
        $dish->dish_code = $request->dish_code;
        $dish->dish_hsn = $request->dish_hsn;
        $dish->counter_id = $request->counter_id;
        $dish->category_id = $request->category_id;
        $dish->is_tax_inclusive = $request->tax_inc;
        $dish->has_variant = $request->dish_has_variant;
        $dish->chef_preparation = !empty($request->chef_preparation)? $request->chef_preparation : 0;
        
        if ($request->file('dish_image')) {
            $imageFileType = $request->dish_image->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/dish/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->dish_image));
            $dish->dish_images = $imageName;
        }

        $dish->save();

        $dishTax = DishHasTax::where('dish_id', $id)->first();
        $dishTax->tax_id = $request->tax_id;
        $dishTax->save();
        
        return redirect()->route('edit-dish', ['id'=>base64_encode($id)])->with('success', 'Changes saved Successfully!');
    }

    public function dishStatus(Request $request)
    {
        $size = Dish::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Dish status updated!');
    }

    public function getBranchTax($id){

        $category = Category::find($id);
        $tax_detail = Branch::find($category->branch_id)->first();
        $tax_id = explode(",", $tax_detail->tax_ids);
        $tax = CountryTax::whereIn('id', $tax_id)->get();
        return $tax;
    }

    public function exportDish(){

    }
}
