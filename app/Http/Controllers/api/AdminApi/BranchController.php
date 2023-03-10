<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Region;
use App\Models\Company;
use App\Models\Discount;
use Storage;
use Auth;
use Log;
use Validator;

class BranchController extends Controller
{
    public function index(){
        try{
            $branch = Branch::get();
            return response()->json(['message'=>'Branch List!','status'=>true,'data'=>$branch]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }  
    }

    public function regionList()
    {
        try{
            

            $discount    = Discount::get();
            $region_list = Region::where('is_active', 1)->get();
            $company     = Company::where('is_active', 1)->get();
            return response()->json(['message'=>'Branch List!','status'=>true,'data'=>['region_list'=>$region_list,'disocunt'=>$discount,'company_list'=>$company]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createBranch(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'branch_name' => 'required',
                'branch_code' => 'required',
                'branch_manager' => 'required',
                'contact_number' => 'required',
                'company_id' => 'required',
                'city_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $branch = new Branch();
            $branch->name = $request->branch_name;
            $branch->branch_code = $request->branch_code;
            $branch->branch_manager = $request->branch_manager;
            $branch->contact_number = $request->contact_number;
            $branch->gst_no = $request->gst_no;
            $branch->license_no = $request->license_no;
            $branch->is_pos = $request->is_pos ?? 0;
            $branch->is_sok = $request->is_sok ?? 0;
            $branch->is_qrcode = $request->is_qrcode ?? 0;
            $branch->is_mobile_ordering = $request->is_mobile_ordering ?? 0;
            $branch->is_table_room = $request->is_table_room ?? 0;
            $branch->company_id = $request->company_id;
            $branch->city_id = $request->city_id;
            $branch->tax_ids = implode(",", $request->tax_id);
            $branch->discount_ids = $request->discount_id;
            $branch->save();

            DB::commit();
            return response()->json(['message'=>'Branch added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function updateBranch(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'branch_name' => 'required',
                'branch_code' => 'required',
                'branch_manager' => 'required',
                'contact_number' => 'required',
                'company_id' => 'required',
                'city_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            DB::beginTransaction();

            $id = $request->branch_id;
            $branch = Branch::find($id);
            $branch->name = $request->branch_name;
            $branch->branch_code = $request->branch_code;
            $branch->branch_manager = $request->branch_manager;
            $branch->contact_number = $request->contact_number;
            $branch->gst_no = $request->gst_no;
            $branch->license_no = $request->license_no;
            $branch->is_pos = $request->is_pos ?? 0;
            $branch->is_sok = $request->is_sok ?? 0;
            $branch->is_qrcode = $request->is_qrcode ?? 0;
            $branch->is_mobile_ordering = $request->is_mobile_ordering ?? 0;
            $branch->is_table_room = $request->is_table_room ?? 0;
            $branch->company_id = $request->company_id;
            $branch->city_id = $request->city_id;
            $branch->tax_ids = implode(",", $request->tax_id);
            $branch->discount_ids = $request->discount_id;
            $branch->save();

            DB::commit();
            return response()->json(['message'=>'Branch updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function branchStatus(Request $request)
    {
        try{
            DB::beginTransaction();

            $size = Branch::find($request->branch_id);
            $size->is_active = $request->status;
            $size->save();
            
            DB::commit();
            return response()->json(['message'=>'Branch status changed successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getBranch($id){

        $branch = Branch::where('company_id',$id)->get();
        return $branch;
    }
}
