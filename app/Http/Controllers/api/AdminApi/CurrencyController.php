<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Country;
use Auth;
use Log;
use Validator;

class CurrencyController extends Controller
{
    public function index(){
        try{
           $currency = Currency::with('Country')->get();
           return response()->json(['message'=>'Currency List!','status'=>true,'data'=>$currency]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addcurrency(){
        $country_list = Country::get();
        return view('admin-view.currency.add_currency', compact('country_list'));
    }

    public function createcurrency(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'currency_name' => 'required',
                'currency_code' => 'required',
                'symbol' => 'required',
                'country_id' => 'required',
            ],[
                'country_id.required'=>'Country field is Required',
            ]);


            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $currency = new Currency();
            $currency->currency_name = $request->currency_name;
            $currency->currency_code = $request->currency_code;
            $currency->symbol = $request->symbol;
            $currency->country_id = $request->country_id;
            $currency->save();

            DB::commit();
            return response()->json(['message'=>'Currency added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editcurrency($id){
        $country_list = Country::get();
        $currency = Currency::find(base64_decode($id));
        return view('admin-view.currency.edit_currency', compact('currency', 'country_list'));
    }

    public function updatecurrency(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'currency_name' => 'required',
                'currency_code' => 'required',
                'symbol' => 'required',
                'country_id' => 'required',
            ],[
                'country_id.required'=>'Country field is Required',
            ]);


            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $currency = Currency::find($request->currency_id);
            $currency->currency_name = $request->currency_name;
            $currency->currency_code = $request->currency_code;
            $currency->symbol = $request->symbol;
            $currency->country_id = $request->country_id;
            $currency->save();

            DB::commit();
            return response()->json(['message'=>'Currency updated successfully!','status'=>true,'data'=>[]]); 
    }catch (\Throwable $th) {
        Log::debug($th);
        DB::rollback();
        return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
    } 
    }
}
