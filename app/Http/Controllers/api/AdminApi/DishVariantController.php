<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishVariant;
use App\Models\DishOption;
use Log;
use Validator;

class DishVariantController extends Controller
{
    public function index(){
        try{
            $variant = DishVariant::get();
            return response()->json(['message'=>'Dish Variant List!','status'=>true,'data'=>$variant]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addDishVariant($id){
        
        $de_id = base64_decode($id);
        $dish_option = DishOption::where('dish_id',$de_id)->get();
        
        if($dish_option->isEmpty()){
            return redirect()->route('add-option', ['id'=>$id])->with('error', 'First, you will need to add some options!');
        }
        return view('admin-view.dish_variant.add-variant', ['id'=>$id,'dish_option'=>$dish_option]);
    }

    public function createDishVariant(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'price' => 'required',
                
            ],[
                'price.required'=>'Dish Price is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $variant = new DishVariant();
            $variant->variant_price = $request->price;
            $variant->variant_name = implode(",", $request->options);
            $variant->dish_id = $request->dish_id;
            $variant->save();

            DB::commit();

            return response()->json(['message'=>'Dish variant added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
        
    }

    public function editDishVariant($id){
        $d_id = base64_decode($id);
        $variant = DishVariant::where('id', $d_id)->first();
        $dish_option = DishOption::where('dish_id',$variant->dish_id)->get();
        return view('admin-view.dish_variant.edit-variant', compact('variant','dish_option'));
    }

    public function updateDishVariant(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'price' => 'required',
                
            ],[
                'price.required'=>'Dish Price is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $id = $request->variant_id;
            $variant = DishVariant::find($id);
            $variant->variant_price = $request->price;
            $variant->variant_name = implode(",", $request->options);
            $variant->save();
        
            DB::commit();

            return response()->json(['message'=>'Dish variant updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function dishvariantStatus(Request $request)
    {
        try{
            DB::beginTransaction();

            $size = DishVariant::find($request->variant_id);
            $size->is_active = $request->status;
            $size->save();

            DB::commit();

            return response()->json(['message'=>'Dish variant status added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
