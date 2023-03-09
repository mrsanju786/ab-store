<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extra;
use App\Models\DishVariant;
use App\Models\DishOption;
use Log;
use Validator;

class ExtraController extends Controller
{
    public function index(){

        try{
            $variant = Extra::get();
            return response()->json(['message'=>'Extra List!','status'=>true,'data'=>$variant]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addExtra($id){
        
        $de_id = base64_decode($id);
        $dish_option = Extra::where('dish_id',$de_id)->get();
        $variant = DishVariant::where('dish_id', $de_id)->get();
        return view('admin-view.extra.add_extra', ['id'=>$id,'dish_option'=>$dish_option, 'variant'=>$variant]);
    }

    public function createExtra(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'extra_name' => 'required',
                'extra_price' => 'required',
                
            ],[
                'extra_name.required'=>'Dish Price is Required',
                'extra_price.required'=>'Dish Price is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
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

            return response()->json(['message'=>'Extra added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
        
    }

    public function editExtra($id){

        $dish_id = base64_decode($id);
        $extra = Extra::where('id', $dish_id)->first();
        $variant = DishVariant::where('dish_id', $extra->dish_id)->get();
        return view('admin-view.extra.edit_extra', compact('variant', 'extra', 'variant'));
    }

    public function updateExtra(Request $request){
        try{ 
            $validator = Validator::make($request->all(), [
                'extra_name' => 'required',
                'extra_price' => 'required',
                
            ],[
                'extra_name.required'=>'Dish Price is Required',
                'extra_price.required'=>'Dish Price is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            
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
            
            return response()->json(['message'=>'Extra updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

}
