<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;
use App\Models\Area;
use App\Models\Location;
use App\Models\Discount;
use Log;
use Validator;

class CounterController extends Controller
{
    public function index(){
        try{
            $counter = Counter::get();
            $area = Area::get();
            return response()->json(['message'=>'Counter List!','status'=>true,'data'=>['counter_list'=>$counter,'area_list'=>$area]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function createCounter(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'counter_name' => 'required',
                'area_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            DB::beginTransaction();

            $counter = new Counter();
            $counter->counter_name = $request->counter_name;
            $counter->license_no = $request->license_no;
            $counter->license_expiry_date = $request->lincese_expiry_date;
            $counter->area_id = $request->area_id;
            $counter->discount_ids = $request->discount_id;
            $counter->save();

            DB::commit();

            return response()->json(['message'=>'Counter added successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 

    }

    public function updateCounter(Request $request){
        try{
            $request->validate([
                'counter_name' => 'required',
                'area_id' => 'required',
            ]);

            DB::rollback();
            
            $id = $request->counter_id;
            $counter = Counter::find($id);
            $counter->counter_name = $request->counter_name;
            $counter->license_no = $request->license_no;
            $counter->license_expiry_date = $request->lincese_expiry_date;
            $counter->area_id = $request->area_id;
            $counter->discount_ids = $request->discount_id;
            $counter->save();

            DB::commit();

          return response()->json(['message'=>'Counter updated successfully!','status'=>true,'data'=>[]]); 
        }catch (\Throwable $th) {
            Log::debug($th);
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        } 
    }

    public function getCounterByBranch($id){
        $counter = Counter::where('branch_id', $id)->get();
        return $counter;
    }

    public function getCounter($id){

        $location = Location::where('branch_id', $id)->get('id')->toArray();
        $area = Area::whereIn('location_id', $location)->get('id')->toArray();
        $counter = Counter::whereIn('area_id', $area)->get();
        return $counter;

    }
}
