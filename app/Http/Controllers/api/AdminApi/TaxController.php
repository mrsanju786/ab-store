<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax;
use Auth;
use Log;
use Validator;

class TaxController extends Controller
{
    public function index(){
        try{
           $tax = Tax::get();
           return response()->json(['message'=>'Tax List!','status'=>true,'data'=> $tax]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addTax(){
        return view('admin-view.tax.add_tax');
    }

    public function createTax(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'tax_name' => 'required',
                'tax_percent' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $tax = new Tax();
            $tax->tax_name = $request->tax_name;
            $tax->tax_percent = $request->tax_percent;
            $tax->save();

            return response()->json(['message'=>'Tax added successfully!','status'=>true,'data'=> []]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editTax($id){
        $tax = Tax::find(base64_decode($id));
        return view('admin-view.tax.edit_tax', compact('tax'));
    }

    public function updateTax(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'tax_name' => 'required',
                'tax_percent' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            $tax = Tax::find($request->tax_id);
            $tax->tax_name = $request->tax_name;
            $tax->tax_percent = $request->tax_percent;
            $tax->save();

            return response()->json(['message'=>'Tax updated successfully!','status'=>true,'data'=> []]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }
}
