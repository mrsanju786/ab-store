<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use App\Models\License;
use App\Models\CompanyHasRegion;
use App\Models\State;
use Storage;
use Auth;
use Validator;
use Log;

class CompanyController extends Controller
{
    public function index(){
        try{
            $company = Company::get();
            return response()->json(['message'=>'Company List!','image_url'=>env('IMAGE_URL')."/company/",'status'=>true,'data'=>$company]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    public function licenseList(){
        try{
            $license = License::get();
            return response()->json(['message'=>'License List!','status'=>true,'data'=>$license]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    public function createCompany(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'company_logo' => 'required',
                'cin_no' => 'required',
                'registered_address' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'pincode' => 'required',

            ],[
                'company_name.required'=>'Company name is Required',
                'company_logo.required'=>'Company logo is Required',
                'cin_no.required'=>'CIN number is required',
                'registered_address.required'=>'Registered address is required',
                'country_id.required'=>'Country id is required',
                'state_id.required'=>'State id is required',
                'city_id.required'=>'City id is required',
                'pincode.required'=>'Pincode is required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $company = new Company();
            $company->company_name = $request->company_name;
            $company->food_license_id = $request->license_no;
            $company->cin_no = $request->cin_no;
            $company->registered_address = $request->registered_address;
            $company->country_id = $request->country_id;
            $company->state_id = $request->state_id;
            $company->city_id = $request->city_id;
            $company->pincode = $request->pincode;
            $company->created_by = Auth::user()->id;
            
            if ($request->file('company_logo')) {
                $imageFileType = $request->company_logo->getClientOriginalExtension();
                $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
                $dir = "/upload/company/";
                if (!Storage::disk('public')->exists($dir)) {
                    Storage::disk('public')->makeDirectory($dir);
                }
                Storage::disk('public')->put($dir . $imageName, file_get_contents($request->company_logo));
                $company->company_logo = $imageName;
            }

            $company->save();

            $state = State::find($request->state_id);
            $region_id = $state->region_id;
            
            $company_has_region = new CompanyHasRegion;
            $company_has_region->company_id = $company->id;
            $company_has_region->region_id = $region_id;
            $company_has_region->save();

            DB::commit();

            return response()->json(['message'=>'Company Added successfully!','status'=>true,'data'=>[]]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }

    }

    
    public function updateCompany(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'cin_no' => 'required',
                'registered_address' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'pincode' => 'required',

            ],[
                'company_name.required'=>'Company name is Required',
                'cin_no.required'=>'CIN number is required',
                'registered_address.required'=>'Registered address is required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
           
            DB::beginTransaction();

            $id = $request->company_id;
            $company = Company::find($id);
            $company->company_name = $request->company_name;
            $company->food_license_id = $request->license_no;
            $company->cin_no = $request->cin_no;
            $company->registered_address = $request->registered_address;
            $company->country_id = $request->country_id;
            $company->state_id = $request->state_id;
            $company->city_id = $request->city_id;
            $company->pincode = $request->pincode;
            $company->created_by = Auth::user()->id;
            
            if ($request->file('company_logo')) {
                $imageFileType = $request->company_logo->getClientOriginalExtension();
                $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
                $dir = "/upload/company/";
                if (!Storage::disk('public')->exists($dir)) {
                    Storage::disk('public')->makeDirectory($dir);
                }
                Storage::disk('public')->put($dir . $imageName, file_get_contents($request->company_logo));
                $company->company_logo = $imageName;
            }

            $company->save();

            $state = State::find($request->state_id);
            $region_id = $state->region_id;
            
            $company_has_region = CompanyHasRegion::where('company_id',$id)->update(['region_id'=>$region_id]);
            DB::commit();
            return response()->json(['message'=>'Company updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }               
    }

    public function companyStatus(Request $request)
    {
        try{
            DB::beginTransaction();

            $size = Company::find($request->company_id);
            $size->is_active = $request->status;
            $size->save();
            
            DB::commit();

            return response()->json(['message'=>'Company status changed successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }                
    }
}
