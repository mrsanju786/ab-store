<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishVariant;

class DishVariantController extends Controller
{
    public function index($id){

        $variant = DishVariant::get();
        return view('admin-view.dish_variant.index', ['id'=>$id, 'variant'=>$variant]);
    }

    public function addDishVariant(){

        $counter = Counter::get();
        return view('admin-view.dish_variant.add-variant', compact('counter'));
    }

    public function createDishVariant(Request $request){

        $request->validate([
            'dish_name' => 'required',
            'dish_image' => 'required',
            'dish_hsn' => 'required',
            'counter_id' => 'required',
            'tax_inc' => 'required',
            'dish_has_variant' => 'required',

        ],[
            'dish_name.required'=>'Dish Name is Required',
            'dish_image.required'=>'Dish Logo is Required',
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
        $dish->counter_id = $request->counter_id;
        $dish->is_tax_inclusive = $request->tax_inc;
        $dish->has_variant = $request->dish_has_variant;

        $dish->save();

        if($request->dish_has_variant == 1){

            return redirect()->route('edit-dish', ['id'=>base64_encode($dish->id)])->with('success', 'Saved Successfully!');
        }else{

            return redirect()->route('dish-list')->with('success', 'Dish Added Successfully!');
        }

    }

    public function editDishVariant($id){

        $dish = Dish::find(base64_decode($id));
        $counter = Counter::get();
        return view('admin-view.dish_variant.edit-variant', compact('dish','counter'));
    }

    public function updateDishVariant(Request $request){

        $request->validate([
            'dish_name' => 'required',
            'dish_hsn' => 'required',
            'counter_id' => 'required',
            'tax_inc' => 'required',
            'dish_has_variant' => 'required',

        ],[
            'dish_name.required'=>'Dish Name is Required',
            'dish_hsn.required'=>'CIN No. is required',
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
        $dish->is_tax_inclusive = $request->tax_inc;
        $dish->has_variant = $request->dish_has_variant;
        

        $dish->save();
        
        return redirect()->route('edit-variant', ['id'=>base64_encode($id)])->with('success', 'Changes saved Successfully!');
    }

    public function dishvariantStatus(Request $request)
    {
        $size = Dish::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Status updated!');
    }
}
