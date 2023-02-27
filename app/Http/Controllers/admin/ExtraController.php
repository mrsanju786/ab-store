<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extra;
use App\Models\DishVariant;
use App\Models\DishOption;

class ExtraController extends Controller
{
    public function index($id){

        $id = base64_decode($id);
        $variant = Extra::get();
        return view('admin-view.extra.index', ['id'=>$id, 'variant'=>$variant]);
    }

    public function addExtra($id){
        
        $de_id = base64_decode($id);
        $dish_option = Extra::where('dish_id',$de_id)->get();
        $variant = DishVariant::where('dish_id', $de_id)->get();
        return view('admin-view.extra.add_extra', ['id'=>$id,'dish_option'=>$dish_option, 'variant'=>$variant]);
    }

    public function createExtra(Request $request){
        
        $request->validate([
            'extra_name' => 'required',
            'extra_price' => 'required',
            
        ],[
            'extra_name.required'=>'Dish Price is Required',
            'extra_price.required'=>'Dish Price is Required',
        ]);

        $extra = new Extra();
        $extra->extras_name = $request->extra_name;
        $extra->extras_price = $request->extra_price;
        $extra->dish_id = $request->dish_id;
        // $extra->variant_id = implode(",", $request->extra_for_all);
        $extra_variant = $request->extra_for_all;
        if(isset($extra_variant)){
            
            $extra->variant_id = implode(",", $extra_variant);

        }else{

            $all_variant_array = DishVariant::where('dish_id', $request->dish_id)->pluck('id')->toArray();
            $all_variant = implode(",", $all_variant_array);
            $extra->variant_id = $all_variant;
        }

        $extra->save();

        return redirect()->route('edit-dish', ['id'=>base64_encode($request->dish_id)])->with('success', 'Saved Successfully!');
        
    }

    public function editExtra($id){

        $dish_id = base64_decode($id);
        $extra = Extra::where('id', $dish_id)->first();
        $variant = DishVariant::where('dish_id', $extra->dish_id)->get();
        return view('admin-view.extra.edit_extra', compact('variant', 'extra', 'variant'));
    }

    public function updateExtra(Request $request, $id){

        $request->validate([
            'extra_name' => 'required',
            'extra_price' => 'required',
            
        ],[
            'extra_name.required'=>'Dish Price is Required',
            'extra_price.required'=>'Dish Price is Required',
        ]);
        
        $id = $request->extra_id;
        $extra = Extra::find($id);
        $extra->extras_name = $request->extra_name;
        $extra->extras_price = $request->extra_price;
        // $extra->variant_id = implode(",", $request->extra_for_all);
        $extra_variant = $request->extra_for_all;
        if(isset($extra_variant)){
            
            $extra->variant_id = implode(",", $extra_variant);

        }else{

            $all_variant_array = DishVariant::where('dish_id', $request->dish_id)->pluck('id')->toArray();
            $all_variant = implode(",", $all_variant_array);
            $extra->variant_id = $all_variant;
        }
        
        $extra->save();
        
        return redirect()->route('edit-dish', ['id'=>base64_encode($request->dish_id)])->with('success', 'Changes saved Successfully!');
    }

    public function dishvariantStatus(Request $request)
    {
        $size = Extra::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Status updated!');
    }
}
