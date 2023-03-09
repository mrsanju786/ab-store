<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Auth;
use Log;
use Validator;

class DiscountController extends Controller
{
    public function index(){
        try{
          $discount = Discount::get();
          return response()->json(['message'=>'Discount List!','status'=>true,'data'=> $discount]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addDiscount()
    {
        return view('admin-view.discount.add_discount');
    }

    public function createDiscount(Request $request){
        try{
            
            $validator = Validator::make($request->all(), [
                'discount_name' => 'required',
                'discount_percent' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $discount = new Discount();
            $discount->discount_name = $request->discount_name;
            $discount->discount_percent = $request->discount_percent;
            $discount->save();

            return response()->json(['message'=>'Discount added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function editDiscount($id){
        $discount = Discount::find(base64_decode($id));
        return view('admin-view.discount.edit_discount', compact('discount'));
    }

    public function updateDiscount(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'discount_name' => 'required',
                'discount_percent' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $id = $request->discount_id;
            $discount = Discount::find($id);
            $discount->discount_name = $request->discount_name;
            $discount->discount_percent = $request->discount_percent;
            $discount->save();

            return response()->json(['message'=>'Discount updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function discountStatus(Request $request)
    {
        $size = Discount::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success', 'Discount status updated!');
    }
}
