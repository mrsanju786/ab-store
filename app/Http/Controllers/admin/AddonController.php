<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addon;
use App\Models\DishVariant;
use App\Models\DishOption;

class AddonController extends Controller
{
    public function index($id){

        $id = base64_decode($id);
        $variant = Addon::get();
        return view('admin-view.extra.index', ['id'=>$id, 'variant'=>$variant]);
    }

    public function addAddon($id){
        
        $de_id = base64_decode($id);
        $dish_option = Addon::where('dish_id',$de_id)->get();
        $variant = DishVariant::where('dish_id', $de_id)->get();
        return view('admin-view.addon.add_addon', ['id'=>$id,'dish_option'=>$dish_option, 'variant'=>$variant]);
    }

    public function createAddon(Request $request){
        
        $request->validate([
            'addon_name' => 'required',
            'addon_price' => 'required',
            
        ],[
            'addon_name.required'=>'name is Required',
            'addon_price.required'=>'Price is Required',
        ]);

        $addon = new Addon();
        $addon->addon_name = $request->addon_name;
        $addon->addon_price = $request->addon_price;
        $addon->dish_id = $request->dish_id;
        // $extra_variant[] = implode(",", $request->extra_for_all);
        $extra_variant = $request->extra_for_all;
        if(isset($extra_variant)){
            
            $addon->variant_id = implode(",", $extra_variant);

        }else{

            $all_variant_array = DishVariant::where('dish_id', $request->dish_id)->pluck('id')->toArray();
            $all_variant = implode(",", $all_variant_array);
            $addon->variant_id = $all_variant;
        }
        
        $addon->save();

        return redirect()->route('edit-dish', ['id'=>base64_encode($request->dish_id)])->with('success', 'Saved Successfully!');
        
    }

    public function editAddon($id){

        $dish_id = base64_decode($id);
        $addon = Addon::where('id', $dish_id)->first();
        $variant = DishVariant::where('dish_id', $addon->dish_id)->get();
        return view('admin-view.addon.edit_addon', compact('variant', 'addon', 'variant'));
    }

    public function updateAddon(Request $request, $id){

        $request->validate([
            'addon_name' => 'required',
            'addon_price' => 'required',
            
        ],[
            'addon_name.required'=>'Name is Required',
            'addon_price.required'=>'Price is Required',
        ]);
        
        $id = $request->addon_id;
        $addon = Addon::find($id);
        $addon->addon_name = $request->addon_name;
        $addon->addon_price = $request->addon_price;
        // $addon->variant_id = implode(",", $request->extra_for_all);
        $extra_variant = $request->extra_for_all;
        if(isset($extra_variant)){
            
            $addon->variant_id = implode(",", $extra_variant);

        }else{

            $all_variant_array = DishVariant::where('dish_id', $request->dish_id)->pluck('id')->toArray();
            $all_variant = implode(",", $all_variant_array);
            $addon->variant_id = $all_variant;
        }

        $addon->save();
        
        return redirect()->route('edit-dish', ['id'=>base64_encode($request->dish_id)])->with('success', 'Changes saved Successfully!');
    }

    public function dishvariantStatus(Request $request)
    {
        $size = Addon::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Status updated!');
    }
}
