<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishVariant;
use App\Models\DishOption;

class DishVariantController extends Controller
{
    public function index($id){

        $id = base64_decode($id);
        $variant = DishVariant::get();
        return view('admin-view.dish_variant.index', ['id'=>$id, 'variant'=>$variant]);
    }

    public function addDishVariant($id){
        
        $de_id = base64_decode($id);
        $dish_option = DishOption::where('dish_id',$de_id)->get();
        
        return view('admin-view.dish_variant.add-variant', ['id'=>$id,'dish_option'=>$dish_option]);
    }

    public function createDishVariant(Request $request){
        
        $request->validate([
            'price' => 'required',
            
        ],[
            'price.required'=>'Dish Price is Required',
        ]);

        $variant = new DishVariant();
        $variant->variant_price = $request->price;
        $variant->variant_name = implode(",", $request->options);
        $variant->dish_id = $request->dish_id;
        $variant->save();

        return redirect()->route('edit-dish', ['id'=>base64_encode($request->dish_id)])->with('success', 'Saved Successfully!');
        
    }

    public function editDishVariant($id){
        $de_id = base64_decode($id);
        $variant = DishVariant::find(base64_decode($id));
        $dish_option = DishOption::where('dish_id',$de_id)->get();
        return view('admin-view.dish_variant.edit-variant', compact('variant','dish_option'));
    }

    public function updateDishVariant(Request $request, $id){

        $request->validate([
            'price' => 'required',
        ],[
            'price.required'=>'Dish Price is Required',
        ]);
        
        $id = $request->variant_id;
        $variant = DishVariant::find($id);
        $variant->variant_price = $request->price;
        $variant->variant_name = implode(",", $request->options);
        $variant->save();
        
        return redirect()->route('edit-dish', ['id'=>base64_encode($id)])->with('success', 'Changes saved Successfully!');
    }

    public function dishvariantStatus(Request $request)
    {
        $size = Dish::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Status updated!');
    }
}
