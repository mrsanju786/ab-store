<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryTax;
use App\Models\Country;
use App\Models\Company;
use Auth;
use Log;
use Validator;

class CountryTaxController extends Controller
{
    public function index(){
        try{
           $countrytax = CountryTax::with('Country')->get();
           return response()->json(['message'=>'Country Tax List!','status'=>true,'data'=> $countrytax]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function addcountrytax(){
        $country_list = Country::get();
        return view('admin-view.country_tax.add_country_tax', compact('country_list'));
    }

    public function createcountrytax(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'tax_name' => 'required',
                'tax_percent' => 'required',
                'country_id' => 'required',
            ],[
                'country_id.required'=>'Country field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();
            $countrytax = new Countrytax();
            $countrytax->name = $request->tax_name;
            $countrytax->tax_percent = $request->tax_percent;
            $countrytax->country_id = $request->country_id;
            $countrytax->save();

            DB::commit();
            return response()->json(['message'=>'Country Tax added successfully!','status'=>true,'data'=> []]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function editcountrytax($id){
        $country_list = Country::get();
        $countrytax = CountryTax::find(base64_decode($id));
        return view('admin-view.country_tax.edit_country_tax', compact('countrytax', 'country_list'));
    }

    public function updatecountrytax(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'tax_name' => 'required',
                'tax_percent' => 'required',
                'country_id' => 'required',
            ],[
                'country_id.required'=>'Country field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            DB::beginTransaction();
            $countrytax = CountryTax::find($request->countrytax_id);
            $countrytax->name = $request->tax_name;
            $countrytax->tax_percent = $request->tax_percent;
            $countrytax->country_id = $request->country_id;
            $countrytax->save();

            DB::commit();
            return response()->json(['message'=>'Country Tax updated successfully!','status'=>true,'data'=> []]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function countrytaxStatus(Request $request)
    {  
        try{
            DB::beginTransaction();

            $countrytax = CountryTax::find($request->countrytax_id);
            $countrytax->is_active = $request->status;
            $countrytax->save();
            
            DB::commit();

            return response()->json(['message'=>'Country Tax status updated successfully!','status'=>true,'data'=> []]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getCountryTax($id){

        $company = Company::where('id', $id)->first();
        $countryTax = CountryTax::where('country_id', $company->country_id)->get();
        return $countryTax;
    }
}
