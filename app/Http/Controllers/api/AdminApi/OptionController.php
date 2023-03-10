<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishOption;
use Auth;
use Log;
use Validator;

class OptionController extends Controller
{
    public function index(){
       try{
         $option = DishOption::get();
         return response()->json(['message'=>'Opton List!','status'=>true,'data'=>$option]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addOption($id){
        $dish_id = base64_decode($id);
        return view('admin-view.dish_option.add_option', compact('dish_id'));
    }

    public function createOption(Request $request){
        try{

            $validator = Validator::make($request->all(), [
                'option_name' => 'required',
                'option_value' => 'required',
                'dish_id' => 'required',
            ],[
                'dish_id.required'=>'Dish field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
           

            DB::beginTransaction();

            $option = new DishOption();
            $option->option_name = $request->option_name;
            $option->option_value = $request->option_value;
            $option->dish_id = $request->dish_id;
            $option->save();

            DB::commit();

            return response()->json(['message'=>'Option added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editOption($id){
        $option = DishOption::find(base64_decode($id));
        return view('admin-view.dish_option.edit_option', compact('option'));
    }

    public function updateOption(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'option_name' => 'required',
                'option_value' => 'required',
                //'dish_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $option = DishOption::find($request->option_id);
            $option->option_name = $request->option_name;
            $option->option_value = $request->option_value;
            $option->save();

            DB::commit();

            return response()->json(['message'=>'Option updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
