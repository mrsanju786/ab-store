<?php

namespace App\Http\Controllers\api\AdminApi;

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
use App\Models\Discount;
use App\Imports\DishImport;
use App\Exports\DishExport;
use Storage;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Arr;
use Log;
use Validator;

class DishController extends Controller
{
    public function index(){
        try{
            $dish = Dish::get();
            return response()->json(['message'=>'Dish List!','status'=>true,'data'=>$dish]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createDish(Request $request){
        try{

            $validator = Validator::make($request->all(), [
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

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
           
            $dish = new Dish();
            $dish->dish_name = $request->dish_name;
            $dish->dish_price = $request->dish_price;
            $dish->dish_code = $request->dish_code;
            $dish->dish_hsn = $request->dish_hsn;
            $dish->category_id = $request->category_id;
            $dish->counter_id = $request->counter_id;
            $dish->is_tax_inclusive = $request->tax_inc;
            $dish->has_variant = $request->dish_has_variant;
            $dish->discount_ids = $request->discount_id;
            $dish->stock_quantity = $request->stock_quantity;
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
                return response()->json(['message'=>'Dish added successfully!','status'=>true,'data'=>[]]); 
               
            }else{

                return response()->json(['message'=>'Dish added successfully!','status'=>true,'data'=>[]]); 
            }
            
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function updateDish(Request $request){
        try{
            $validator = Validator::make($request->all(), [
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

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

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
            $dish->discount_ids = $request->discount_id;
            $dish->stock_quantity = $request->stock_quantity;
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
            return response()->json(['message'=>'Dish updated successfully!','status'=>true,'data'=>[]]);     
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function dishStatus(Request $request)
    {
        try{
            $size = Dish::find($request->dish_id);
            $size->is_active = $request->status;
            $size->save();
            return response()->json(['message'=>'Dish status changed successfully!','status'=>true,'data'=>[]]);     
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getBranchTax($id){

        $category = Category::find($id);
        $tax_detail = Branch::find($category->branch_id)->first();
        $tax_id = explode(",", $tax_detail->tax_ids);
        $tax = CountryTax::whereIn('id', $tax_id)->get();
        return $tax;
    }

    public function exportDish(){
        try{
           return Excel::download(new DishExport, 'dishes.xlsx');
           return response()->json(['message'=>'Export successfully Successfully!','status'=>true,'data'=>[]]);     
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function importDish() 
    {
        try{
            Excel::import(new DishImport,request()->file('file'));
            return response()->json(['message'=>'Imported Successfully!','status'=>true,'data'=>[]]);     
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

   
    public function updateDishexcel(){
        try{
        $data = Excel::toArray(new DishImport, request()->file('file')); 

        collect(head($data))
            ->each(function ($row, $key) {
                DB::table('dishes')
                    ->where('id', $row['id'])
                    ->update(Arr::except($row, ['id']));
            });
            return response()->json(['message'=>'Updated Successfully!','status'=>true,'data'=>[]]);     
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
       
    }
}
